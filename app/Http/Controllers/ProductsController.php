<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Config;
use Session;

class ProductsController extends Controller
{

	public function index()
	{
		$products = Product::sortable()
			->orderBy('code','asc')
			->paginate(Config::get('settings.rowsPerPage'));
		return view('invoicer.products.index', compact('products'));
	}


	public function create()
	{
		return view('invoicer.products.create');
	}


	public function store(Request $request)
	{
		// validate the data
		$this->validate($request, array(
			'code' => 'required|unique:products,code',
			'details' => 'required',
		));

		// save the data in the database
		$product = new Product;
			$product->code = $request->code;
			$product->details = $request->details;
		$product->save();

		// set a flash message to be displayed on screen
		Session::flash('success','The product was successfully saved!');

		// redirect to another page
	   return redirect()->route('invoicer.products.index');
	}


	public function show($id)
	{
		$product = Product::findOrFail($id);
		return view('invoicer.products.show', compact('product'));
	}


	public function edit($id)
	{
		$product = Product::findOrFail($id);
		return view('invoicer.products.edit', compact('product'));
	}


	public function update(Request $request, $id)
	{
		// validate the data
		$this->validate($request, array(
			'code' => 'required|unique:products,code,' . $id,
			// 'code' => 'required',
			'details' => 'required',
		));

		$product = Product::find($id);
			$product->code = $request->code;
			$product->details = $request->details;
		$product->save();
		
		// Set flash data with success message
		Session::flash ('success', 'The product was successfully updated!');

		// Redirect
		return redirect()->route('invoicer.products.index');
	}


	public function destroy($id)
	{
		$product = Product::find($id);
		$product->delete();

		// Set flash data with success message
		Session::flash('success','The product was deleted successfully.');

		// Redirect
		return redirect()->route('invoicer.products.index');
	}


	public function search(Request $request)
	{
		//dd($request->q);
		if($request->selection == 'code') {
			$products = Product::where('code', 'like', '%' . $request->searchWord . '%')->paginate(10);
		}

		if($request->selection == 'details') {
			$products = Product::where('details', 'like', $request->searchWord . '%')->paginate(10);
		}
		
		return view('invoicer.products.index', compact('products'));
	}

}
