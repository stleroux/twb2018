<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Input;
use App\Client;
use App\Invoice;
use App\InvoiceItem;
use App\Product;
use carbon\Carbon;
use Config;
use DB;
use PDF;
use Session;

class InvoicesController extends Controller
{

	public function index()
	{
		$invoices = Invoice::sortable()
			->orderBy('id','desc')
			->paginate(Config::get('settings.rowsPerPage'));
		return view('invoicer.invoices.index', compact('invoices'));
	}


	public function create()
	{
		$clients = Client::orderBy('company_name','asc')->pluck('company_name','id');
		$products = Product::all();
		return view('invoicer.invoices.create', compact('clients','products'));
	}


	public function store(Request $request)
	{
		// validate the data
		$this->validate($request, [
			'client_id' => 'required',
			// 'work_date' => 'required',
			'status' => 'required'
		]);

		// save the data in the database
		$invoice = new Invoice;
			// $invoice->work_date = $request->work_date;
			$invoice->client_id = $request->client_id;
			$invoice->notes = $request->notes;
			$invoice->status = $request->status;
		$invoice->save();

		// Add items to InvoiceItem table
		if($request->invoiceItem) {
			foreach($request->invoiceItem as $data)
			{
				$item = new InvoiceItem($data);
					$item->invoice_id = $invoice->id;
				$item->save();
			}
		}

		// set a flash message to be displayed on screen
		Session::flash('success','The invoice was successfully saved!');

		// redirect to another page
	   return redirect()->route('invoicer.invoices.index');
	}


	public function show($id)
	{
		$invoice = Invoice::with('invoiceItems')->find($id);
		//dd($invoice);
		return view('invoicer.invoices.show', compact('invoice'));
	}


	public function edit($id)
	{
		$invoice = Invoice::with('InvoiceItems')->find($id);
		// dd($invoice);
		$clients = Client::orderBy('company_name','asc')->pluck('company_name','id');
		//$invoiceitems = InvoiceItem::where('invoice_id', $invoice->id);
		//dd($invoiceitems);
		return view('invoicer.invoices.edit', compact('invoice','clients'));
	}


	public function update(Request $request, $id)
	{
		// validate the data
		$this->validate($request,
			[
				'client_id' => 'required',
				'status' => 'required',
			]);

		$invoice = Invoice::find($id);
			// $invoice->work_date = $request->work_date;
			$invoice->client_id = $request->client_id;
			$invoice->notes = $request->notes;
			$invoice->status = $request->status;
			$invoice->invoiced_at = $request->invoiced_at;
			$invoice->paid_at = $request->paid_at;

			// Perform required calculations
			$inv_amount_charged = DB::table('invoiceitems')->where('invoice_id', '=', $invoice->id)->sum('total');
			$inv_hst = $inv_amount_charged * Config::get('invoicer.hst_rate');
			$inv_sub_total = $inv_amount_charged + $inv_hst;
			$inv_wsib = $inv_amount_charged * Config::get('invoicer.wsib_rate');
			$inv_income_taxes = $inv_amount_charged * Config::get('invoicer.income_tax_rate');
			$inv_total_deductions = $inv_wsib + $inv_income_taxes;
			$inv_total = $inv_amount_charged - $inv_total_deductions;
			
			// Set the values to be updated
			$invoice->amount_charged = $inv_amount_charged;
			$invoice->hst = $inv_hst;
			$invoice->sub_total = $inv_sub_total;
			$invoice->wsib = $inv_wsib;
			$invoice->income_taxes = $inv_income_taxes;
			$invoice->total_deductions = $inv_total_deductions;
			$invoice->total = $inv_total;
		$invoice->save();

		// Set flash data with success message
		Session::flash ('success', 'This invoice was successfully updated!');

		// Redirect to posts.show
		return redirect()->route('invoicer.invoices.index');
	}


	public function destroy($id)
	{
		$invoice = Invoice::find($id);
		$invoice->delete();
		Session::flash('success','The invoice was deleted successfully.');
		return redirect()->route('invoicer.invoices.index');
	}


	public function paid()
	{
		$invoices = Invoice::sortable()->where('status','=','paid')
			->paginate(Config::get('settings.rowsPerPage'));
		return view('invoicer.invoices.index', compact('invoices'));
	}


	public function invoiced()
	{
		$invoices = Invoice::sortable()->where('status','=','invoiced')
			->paginate(Config::get('settings.rowsPerPage'));
		return view('invoicer.invoices.index', compact('invoices'));
	}


	public function logged()
	{
		$invoices = Invoice::sortable()->where('status','=','logged')
			->paginate(Config::get('settings.rowsPerPage'));
		return view('invoicer.invoices.index', compact('invoices'));
	}


	public function status_invoiced($id)
	{
		$invoice = Invoice::findOrFail($id);
			$invoice->status = 'invoiced';
			$invoice->invoiced_at = Carbon::now();
		$invoice->save();

		// Set flash data with success message
		Session::flash ('success', 'This invoice was successfully updated!');

		// Redirect to posts.show
		return redirect()->route('invoicer.invoices.index');
	}


	public function status_invoiced_all()
	{
		$invoices = Invoice::where('status', '=', 'logged')->get();
			
			foreach($invoices as $invoice) {
				$invoice->status = 'invoiced';
				$invoice->invoiced_at = Carbon::now();
				$invoice->save();
			}

		// Set flash data with success message
		Session::flash ('success', 'All logged invoices have successfully been marked as invoiced!');

		// Redirect to posts.show
		return redirect()->route('invoicer.invoices.index');
	}


	public function status_paid($id)
	{
		$invoice = Invoice::findOrFail($id);
			$invoice->status = 'paid';
			$invoice->paid_at = Carbon::now();
		$invoice->save();

		// Set flash data with success message
		Session::flash ('success', 'This invoice was successfully updated!');

		// Redirect to posts.show
		return redirect()->route('invoicer.invoices.index');
	}


	public function status_paid_all()
	{
		$invoices = Invoice::where('status', '=', 'invoiced')->get();
			
			foreach($invoices as $invoice) {
				$invoice->status = 'paid';
				$invoice->paid_at = Carbon::now();
				$invoice->save();
			}

		// Set flash data with success message
		Session::flash ('success', 'All invoiced invoices have successfully been marked as paid!');

		// Redirect to posts.show
		return redirect()->route('invoicer.invoices.index');
	}


	// public function invoice_to_pdf($id)
 //   {
 //   	$invoice = Invoice::with('client','invoiceitems')->find($id);
 //   	//dd($invoice);
 //    	$pdf = PDF::loadView('invoicer.invoices.invoice_to_pdf', compact('invoice'));
	// 	return $pdf->download('invoice_'.$id.'.pdf');
 //   }

}


	// public function show($id)
	// {
	// 	$invoice = Invoice::with('invoiceItems')->find($id);
	// 	//dd($invoice);
	// 	return view('invoicer.invoices.show', compact('invoice'));
	// }