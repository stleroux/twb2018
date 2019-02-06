<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use App\Invoice;
use App\InvoiceItem;
use App\Product;

class InvoicerController extends Controller
{

	public function index()
	{
		return view("invoicer.index");
	}

   public function dashboard() 
   {
      $clients = Client::orderBy('company_name','asc')->get();
      $invoicesTotal = Invoice::all();
      $invoicesLogged = Invoice::where('status','logged')->get();
      $invoicesInvoiced = Invoice::where('status','invoiced')->get();
      $invoicesPaid = Invoice::where('status','paid')->get();
      $invoiceItems = InvoiceItem::all();
      $products = Product::all();
      
      return view('invoicer.dashboard.index', compact('clients', 'invoicesTotal', 'invoicesLogged', 'invoicesInvoiced', 'invoicesPaid', 'invoiceItems', 'products'));
   }


}
