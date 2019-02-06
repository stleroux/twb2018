<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Module;
use Auth;
use DB;
use Excel;
use File;
use Image;
use Purifier;
use Session;
use Storage;
use Log;

use App\Http\Requests\CreateModuleRequest;
use App\Http\Requests\UpdatemoduleRequest;

class ModulesController extends Controller
{

##################################################################################################################
#  ██████╗ ██████╗ ███╗   ██╗███████╗████████╗██████╗ ██╗   ██╗ ██████╗████████╗
# ██╔════╝██╔═══██╗████╗  ██║██╔════╝╚══██╔══╝██╔══██╗██║   ██║██╔════╝╚══██╔══╝
# ██║     ██║   ██║██╔██╗ ██║███████╗   ██║   ██████╔╝██║   ██║██║        ██║   
# ██║     ██║   ██║██║╚██╗██║╚════██║   ██║   ██╔══██╗██║   ██║██║        ██║   
# ╚██████╗╚██████╔╝██║ ╚████║███████║   ██║   ██║  ██║╚██████╔╝╚██████╗   ██║   
#  ╚═════╝ ╚═════╝ ╚═╝  ╚═══╝╚══════╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝  ╚═════╝   ╚═╝   
##################################################################################################################
  public function __construct() {
    // only allow authenticated users to access these pages
    $this->middleware('auth');

    //Log::useFiles(storage_path().'/logs/Admin_Modules.log');
  }


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
    // if(!checkACL('manager')) {
    //   return view('errors.403');
    // }

    $modules = Module::orderBy('name','ASC')->get();
    return view('backend.modules.index',compact('modules'));
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
  public function store(CreateModuleRequest $request)
  {
    // if(!checkACL('manager')) {
    //   return view('errors.403');
    // }

    $module = new Module;
      $module->name = $request->name;
    $module->save();

    // Save entry to log file using built-in Monolog
    //Log::info(Auth::user()->username . " (" . Auth::user()->id . ") CREATED module (" . $module->id . ")\r\n", [json_decode($module, true)]);

    Session::flash('success','The new module has been created.');
    return redirect()->route('backend.modules.index');
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
  public function edit($id)
  {
    // if(!checkACL('manager')) {
    //   return view('errors.403');
    // }

    $module = Module::find($id);
    return  view('backend.modules.edit', compact('module'));
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
  public function update(UpdateModuleRequest $request, $id)
  {
    // if(!checkACL('manager')) {
    //   return view('errors.403');
    // }

    // Get the category value from the database
    $module = Module::find($id);
      $module->name = $request->input('name');
    $module->save();

    // Save entry to log file using built-in Monolog
    //Log::info(Auth::user()->username . " (" . Auth::user()->id . ") UPDATED module (" . $module->id . ")\r\n", [json_decode($module, true)]);

    // Set flash data with success message
    Session::flash ('success', 'The module was successfully updated!');
    // Redirect to posts.show
    return redirect()->route('backend.modules.index');
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
  public function destroy($id)
  {
    // if(!checkACL('manager')) {
    //   return view('errors.403');
    // }

    $module = Module::find($id);

    // $categories = Category::where('module_id', '=', $id);
    // dd($categories);

    $module->delete();

    // Save entry to log file using built-in Monolog
    //Log::info(Auth::user()->username . " (" . Auth::user()->id . ") DELETED module (" . $module->id . ")\r\n", [json_decode($module, true)]);

    Session::flash('success', 'The module was successfully deleted!');
    return redirect()->route('backend.modules.index');
  }


##################################################################################################################
# ███████╗██╗  ██╗██████╗  ██████╗ ██████╗ ████████╗    ██████╗ ██████╗ ███████╗
# ██╔════╝╚██╗██╔╝██╔══██╗██╔═══██╗██╔══██╗╚══██╔══╝    ██╔══██╗██╔══██╗██╔════╝
# █████╗   ╚███╔╝ ██████╔╝██║   ██║██████╔╝   ██║       ██████╔╝██║  ██║█████╗  
# ██╔══╝   ██╔██╗ ██╔═══╝ ██║   ██║██╔══██╗   ██║       ██╔═══╝ ██║  ██║██╔══╝  
# ███████╗██╔╝ ██╗██║     ╚██████╔╝██║  ██║   ██║       ██║     ██████╔╝██║     
# ╚══════╝╚═╝  ╚═╝╚═╝      ╚═════╝ ╚═╝  ╚═╝   ╚═╝       ╚═╝     ╚═════╝ ╚═╝     
##################################################################################################################
	public function exportPDF()
  {
    if(!checkACL('manager')) {
      return view('errors.403');
    }

    $data = Module::get()->toArray();
    return Excel::create('Modules_List', function($excel) use ($data) {
      $excel->sheet('mySheet', function($sheet) use ($data)
      {
        $sheet->fromArray($data);
      });
    })->download("pdf");
  }


##################################################################################################################
# ██╗███╗   ███╗██████╗  ██████╗ ██████╗ ████████╗
# ██║████╗ ████║██╔══██╗██╔═══██╗██╔══██╗╚══██╔══╝
# ██║██╔████╔██║██████╔╝██║   ██║██████╔╝   ██║   
# ██║██║╚██╔╝██║██╔═══╝ ██║   ██║██╔══██╗   ██║   
# ██║██║ ╚═╝ ██║██║     ╚██████╔╝██║  ██║   ██║   
# ╚═╝╚═╝     ╚═╝╚═╝      ╚═════╝ ╚═╝  ╚═╝   ╚═╝   
// IMPORT :: Show the form for importing entries to storage.
##################################################################################################################
  public function import()
  {
    if(!checkACL('manager')) {
      return view('errors.403');
    }

    return view('backend.modules.import');
  }


##################################################################################################################
# ██████╗  ██████╗ ██╗    ██╗███╗   ██╗██╗      ██████╗  █████╗ ██████╗     ███████╗██╗  ██╗ ██████╗███████╗██╗     
# ██╔══██╗██╔═══██╗██║    ██║████╗  ██║██║     ██╔═══██╗██╔══██╗██╔══██╗    ██╔════╝╚██╗██╔╝██╔════╝██╔════╝██║     
# ██║  ██║██║   ██║██║ █╗ ██║██╔██╗ ██║██║     ██║   ██║███████║██║  ██║    █████╗   ╚███╔╝ ██║     █████╗  ██║     
# ██║  ██║██║   ██║██║███╗██║██║╚██╗██║██║     ██║   ██║██╔══██║██║  ██║    ██╔══╝   ██╔██╗ ██║     ██╔══╝  ██║     
# ██████╔╝╚██████╔╝╚███╔███╔╝██║ ╚████║███████╗╚██████╔╝██║  ██║██████╔╝    ███████╗██╔╝ ██╗╚██████╗███████╗███████╗
# ╚═════╝  ╚═════╝  ╚══╝╚══╝ ╚═╝  ╚═══╝╚══════╝ ╚═════╝ ╚═╝  ╚═╝╚═════╝     ╚══════╝╚═╝  ╚═╝ ╚═════╝╚══════╝╚══════╝
##################################################################################################################
  public function downloadExcel($type)
  {
    if(!checkACL('manager')) {
      return view('errors.403');
    }

    $data = Module::get()->toArray();
    return Excel::create('Modules_List', function($excel) use ($data) {
      $excel->sheet('mySheet', function($sheet) use ($data)
      {
        $sheet->fromArray($data);
      });
    })->download($type);
  }


##################################################################################################################
# ██╗███╗   ███╗██████╗  ██████╗ ██████╗ ████████╗    ███████╗██╗   ██╗███╗   ██╗ ██████╗████████╗██╗ ██████╗ ███╗   ██╗
# ██║████╗ ████║██╔══██╗██╔═══██╗██╔══██╗╚══██╔══╝    ██╔════╝██║   ██║████╗  ██║██╔════╝╚══██╔══╝██║██╔═══██╗████╗  ██║
# ██║██╔████╔██║██████╔╝██║   ██║██████╔╝   ██║       █████╗  ██║   ██║██╔██╗ ██║██║        ██║   ██║██║   ██║██╔██╗ ██║
# ██║██║╚██╔╝██║██╔═══╝ ██║   ██║██╔══██╗   ██║       ██╔══╝  ██║   ██║██║╚██╗██║██║        ██║   ██║██║   ██║██║╚██╗██║
# ██║██║ ╚═╝ ██║██║     ╚██████╔╝██║  ██║   ██║       ██║     ╚██████╔╝██║ ╚████║╚██████╗   ██║   ██║╚██████╔╝██║ ╚████║
# ╚═╝╚═╝     ╚═╝╚═╝      ╚═════╝ ╚═╝  ╚═╝   ╚═╝       ╚═╝      ╚═════╝ ╚═╝  ╚═══╝ ╚═════╝   ╚═╝   ╚═╝ ╚═════╝ ╚═╝  ╚═══╝
##################################################################################################################
  public function importExcel()
  {
    if(!checkACL('manager')) {
      return view('errors.403');
    }

    if(Input::hasFile('import_file')){
      $path = Input::file('import_file')->getRealPath();
      $data = Excel::load($path, function($reader) {})->get();
      
      if(!empty($data) && $data->count()){
        foreach ($data as $key => $value) {
          $insert[] = [
            'name'         => $value->name,
            'created_at'    => $value->created_at,
            'updated_at'    => $value->updated_at,
          ];
        }
              
        if(!empty($insert)){
          DB::table('modules')->insert($insert);
          //dd('Insert Record successfully.');
          Session::flash('Success','Import was successfull!');
          //return view('roles.index');
          return redirect()->route('backend.modules.index');
        }
      }
    }
    return back();
  }


##################################################################################################################
# ███╗   ██╗███████╗██╗    ██╗    ███╗   ███╗ ██████╗ ██████╗ ██╗   ██╗██╗     ███████╗███████╗
# ████╗  ██║██╔════╝██║    ██║    ████╗ ████║██╔═══██╗██╔══██╗██║   ██║██║     ██╔════╝██╔════╝
# ██╔██╗ ██║█████╗  ██║ █╗ ██║    ██╔████╔██║██║   ██║██║  ██║██║   ██║██║     █████╗  ███████╗
# ██║╚██╗██║██╔══╝  ██║███╗██║    ██║╚██╔╝██║██║   ██║██║  ██║██║   ██║██║     ██╔══╝  ╚════██║
# ██║ ╚████║███████╗╚███╔███╔╝    ██║ ╚═╝ ██║╚██████╔╝██████╔╝╚██████╔╝███████╗███████╗███████║
# ╚═╝  ╚═══╝╚══════╝ ╚══╝╚══╝     ╚═╝     ╚═╝ ╚═════╝ ╚═════╝  ╚═════╝ ╚══════╝╚══════╝╚══════╝
// Display a listing of the resource that were created since the user's last login.
##################################################################################################################
   public function newModules(Request $request, $key=null)
   {
      // if(!checkACL('guest')) {
      //     return view('errors.403');
      // }

      //$alphas = range('A', 'Z');
      $alphas = DB::table('modules')
         ->select(DB::raw('DISTINCT LEFT(name, 1) as letter'))
         ->where('created_at', '>=' , Auth::user()->last_login_date)
         //->where('user_id', '=', Auth::user()->id)
         // ->where('personal', '!=', 1)
         // ->where('published_at','!=', null)
         ->orderBy('letter')
         ->get();
      //dd($alphas);

      $letters = [];
      foreach($alphas as $alpha) {
        $letters[] = $alpha->letter;
      }

      // If $key value is passed
      if ($key) {
         $modules = Module::newModules()
            ->where('namee', 'like', $key . '%')
            ->get();
         return view('backend.modules.newModules', compact('modules','letters'));
      }

      $modules = Module::newModules()->get();
      return view('backend.modules.newModules', compact('modules','letters'));
   }

   
 }