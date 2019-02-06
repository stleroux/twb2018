<?php

namespace App\Http\Controllers;

use App\CsvData;
use App\Item;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\CsvImportRequest;

use Maatwebsite\Excel\Facades\Excel;

class ItemsController extends Controller
{

##################################################################################################################
# ██╗███╗   ██╗██████╗ ███████╗██╗  ██╗
# ██║████╗  ██║██╔══██╗██╔════╝╚██╗██╔╝
# ██║██╔██╗ ██║██║  ██║█████╗   ╚███╔╝ 
# ██║██║╚██╗██║██║  ██║██╔══╝   ██╔██╗ 
# ██║██║ ╚████║██████╔╝███████╗██╔╝ ██╗
# ╚═╝╚═╝  ╚═══╝╚═════╝ ╚══════╝╚═╝  ╚═╝
// Display a list of resources
##################################################################################################################
	public function index()
	{
		if(!checkACL('guest')) {
			 return view('errors.403');
			// abort(403);
		}

		$items = Item::all();
		return view('items.index', compact('items'));
	}


	public function published()
	{
		$items = Item::where('status',1)->get();
		//dd($items);
		return view('items.index', compact('items'));
	}

	public function unpublished()
	{
		$items = Item::where('status',2)->get();
		//dd($items);
		return view('items.index', compact('items'));
	}

	public function future()
	{
		$items = Item::where('status',3)->get();
		//dd($items);
		return view('items.index', compact('items'));
	}

	public function trashed()
	{
		$items = Item::where('status',4)->get();
		//dd($items);
		return view('items.index', compact('items'));
	}

##################################################################################################################
#  ██████╗██████╗ ███████╗ █████╗ ████████╗███████╗
# ██╔════╝██╔══██╗██╔════╝██╔══██╗╚══██╔══╝██╔════╝
# ██║     ██████╔╝█████╗  ███████║   ██║   █████╗  
# ██║     ██╔══██╗██╔══╝  ██╔══██║   ██║   ██╔══╝  
# ╚██████╗██║  ██║███████╗██║  ██║   ██║   ███████╗
#  ╚═════╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝   ╚═╝   ╚══════╝
// Show the form for creating a new resource
##################################################################################################################
	public function create()
	{
		//
	}


##################################################################################################################
# ███████╗████████╗ ██████╗ ██████╗ ███████╗
# ██╔════╝╚══██╔══╝██╔═══██╗██╔══██╗██╔════╝
# ███████╗   ██║   ██║   ██║██████╔╝█████╗  
# ╚════██║   ██║   ██║   ██║██╔══██╗██╔══╝  
# ███████║   ██║   ╚██████╔╝██║  ██║███████╗
# ╚══════╝   ╚═╝    ╚═════╝ ╚═╝  ╚═╝╚══════╝
// Store a newly created resource in storage
##################################################################################################################
	public function store(Request $request)
	{
		//
	}


##################################################################################################################
# ███████╗██╗  ██╗ ██████╗ ██╗    ██╗
# ██╔════╝██║  ██║██╔═══██╗██║    ██║
# ███████╗███████║██║   ██║██║ █╗ ██║
# ╚════██║██╔══██║██║   ██║██║███╗██║
# ███████║██║  ██║╚██████╔╝╚███╔███╔╝
# ╚══════╝╚═╝  ╚═╝ ╚═════╝  ╚══╝╚══╝ 
// Display the specified resource
##################################################################################################################
	public function show(Item $item)
	{
		//
	}


##################################################################################################################
# ███████╗██████╗ ██╗████████╗
# ██╔════╝██╔══██╗██║╚══██╔══╝
# █████╗  ██║  ██║██║   ██║   
# ██╔══╝  ██║  ██║██║   ██║   
# ███████╗██████╔╝██║   ██║   
# ╚══════╝╚═════╝ ╚═╝   ╚═╝   
// Show the form for editing the specified resource
##################################################################################################################
	public function edit(Item $item)
	{
		//
	}


##################################################################################################################
# ██╗   ██╗██████╗ ██████╗  █████╗ ████████╗███████╗
# ██║   ██║██╔══██╗██╔══██╗██╔══██╗╚══██╔══╝██╔════╝
# ██║   ██║██████╔╝██║  ██║███████║   ██║   █████╗  
# ██║   ██║██╔═══╝ ██║  ██║██╔══██║   ██║   ██╔══╝  
# ╚██████╔╝██║     ██████╔╝██║  ██║   ██║   ███████╗
#  ╚═════╝ ╚═╝     ╚═════╝ ╚═╝  ╚═╝   ╚═╝   ╚══════╝
// UPDATE :: Update the specified resource in storage
##################################################################################################################
	public function update(Request $request, Item $item)
	{
		//
	}


##################################################################################################################
# ██████╗ ███████╗███████╗████████╗██████╗  ██████╗ ██╗   ██╗
# ██╔══██╗██╔════╝██╔════╝╚══██╔══╝██╔══██╗██╔═══██╗╚██╗ ██╔╝
# ██║  ██║█████╗  ███████╗   ██║   ██████╔╝██║   ██║ ╚████╔╝ 
# ██║  ██║██╔══╝  ╚════██║   ██║   ██╔══██╗██║   ██║  ╚██╔╝  
# ██████╔╝███████╗███████║   ██║   ██║  ██║╚██████╔╝   ██║   
# ╚═════╝ ╚══════╝╚══════╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝    ╚═╝   
// Remove the specified resource from storage
// Used in the index page and trashAll action to soft delete multiple records
##################################################################################################################
	public function destroy(Item $item)
	{
		//
	}



	public function getImport()
	{
		return view('items.import.form');
	}

	public function parseImport(CsvImportRequest $request)
	{
		$path = $request->file('csv_file')->getRealPath();

		if ($request->has('header')) {
			$data = Excel::load($path, function($reader) {})->get()->toArray();
		} else {
			$data = array_map('str_getcsv', file($path));
		}

		if (count($data) > 0) {

			if ($request->has('header')) {
				$csv_header_fields = [];

				foreach ($data[0] as $key => $value) {
					$csv_header_fields[] = $key;
				}
				
			}

			$csv_data = array_slice($data, 0, 3);
			$csv_data_file = CsvData::create([
				'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
				'csv_header' => $request->has('header'),
				'csv_data' => json_encode($data)
			]);

		} else {

			return redirect()->back();

		}

		return view('items.import.fields', compact( 'csv_header_fields', 'csv_data', 'csv_data_file'));
	}
	

	public function processImport(Request $request)
	{
		$data = CsvData::find($request->csv_data_file_id);
		$csv_data = json_decode($data->csv_data, true);

		foreach ($csv_data as $row) {
			$item = new Item();

			foreach (config('app.items_db_fields') as $index => $field) {
				if ($data->csv_header) {
					$item->$field = $row[$request->fields[$field]];
				} else {
					$item->$field = $row[$request->fields[$index]];
				}
			}

			$item->save();

		}

		return view('items.import.success');
	}


}



