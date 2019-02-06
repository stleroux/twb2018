<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Modules\Invoicer\Models\Ledger;
use App\Invoice;
use Config;
use DB;

class LedgerController extends Controller
{

	public function index()
	{
		$invoices = Invoice::sortable()
			->orderBy('id','desc')
			->paginate(Config::get('settings.rowsPerPage'))
			;
		$totalAmountCharged = DB::table('invoices')->sum('amount_charged');
		$totalHST = DB::table('invoices')->sum('hst');
		$totalSubTotal = DB::table('invoices')->sum('sub_total');
		$totalWSIB = DB::table('invoices')->sum('wsib');
		$totalIncomeTaxes = DB::table('invoices')->sum('income_taxes');
		$totalTotalDeductions = DB::table('invoices')->sum('total_deductions');
		$totalTotal = DB::table('invoices')->sum('total');
		// dd($invoices);
		return view('invoicer.ledger.index', compact('invoices','totalHST','totalAmountCharged','totalSubTotal', 'totalWSIB', 'totalIncomeTaxes','totalTotalDeductions', 'totalTotal'));
	}

	public function paid()
	{
		$invoices = Invoice::sortable()->where('status','=','paid')
			->paginate(Config::get('settings.rowsPerPage'));
		$totalAmountCharged = DB::table('invoices')->where('status','=','paid')->sum('amount_charged');
		$totalHST = DB::table('invoices')->where('status','=','paid')->sum('hst');
		$totalSubTotal = DB::table('invoices')->where('status','=','paid')->sum('sub_total');
		$totalWSIB = DB::table('invoices')->where('status','=','paid')->sum('wsib');
		$totalIncomeTaxes = DB::table('invoices')->where('status','=','paid')->sum('income_taxes');
		$totalTotalDeductions = DB::table('invoices')->where('status','=','paid')->sum('total_deductions');
		$totalTotal = DB::table('invoices')->where('status','=','paid')->sum('total');

		return view('invoicer.ledger.index', compact('invoices','totalHST','totalAmountCharged','totalSubTotal', 'totalWSIB', 'totalIncomeTaxes','totalTotalDeductions', 'totalTotal'));
	}

	public function invoiced()
	{
		$invoices = Invoice::sortable()->where('status','=','invoiced')
			->paginate(Config::get('settings.rowsPerPage'));
		$totalAmountCharged = DB::table('invoices')->where('status','=','invoiced')->sum('amount_charged');
		$totalHST = DB::table('invoices')->where('status','=','invoiced')->sum('hst');
		$totalSubTotal = DB::table('invoices')->where('status','=','invoiced')->sum('sub_total');
		$totalWSIB = DB::table('invoices')->where('status','=','invoiced')->sum('wsib');
		$totalIncomeTaxes = DB::table('invoices')->where('status','=','invoiced')->sum('income_taxes');
		$totalTotalDeductions = DB::table('invoices')->where('status','=','invoiced')->sum('total_deductions');
		$totalTotal = DB::table('invoices')->where('status','=','invoiced')->sum('total');

		return view('invoicer.ledger.index', compact('invoices','totalHST','totalAmountCharged','totalSubTotal', 'totalWSIB', 'totalIncomeTaxes','totalTotalDeductions', 'totalTotal'));
	}

	public function logged()
	{
		$invoices = Invoice::sortable()->where('status','=','logged')
			->paginate(Config::get('settings.rowsPerPage'));
		$totalAmountCharged = DB::table('invoices')->where('status','=','logged')->sum('amount_charged');
		$totalHST = DB::table('invoices')->where('status','=','logged')->sum('hst');
		$totalSubTotal = DB::table('invoices')->where('status','=','logged')->sum('sub_total');
		$totalWSIB = DB::table('invoices')->where('status','=','logged')->sum('wsib');
		$totalIncomeTaxes = DB::table('invoices')->where('status','=','logged')->sum('income_taxes');
		$totalTotalDeductions = DB::table('invoices')->where('status','=','logged')->sum('total_deductions');
		$totalTotal = DB::table('invoices')->where('status','=','logged')->sum('total');

		return view('invoicer.ledger.index', compact('invoices','totalHST','totalAmountCharged','totalSubTotal', 'totalWSIB', 'totalIncomeTaxes','totalTotalDeductions', 'totalTotal'));
	}

}
