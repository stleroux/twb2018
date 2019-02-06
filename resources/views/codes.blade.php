{{-- @php
echo Route::getCurrentRoute()->getActionName(); // returns : App\Http\Controllers\Backend\ArticlesController@index
echo "<br />";
echo Request::route()->getName(); // returns : backend.articles.index
echo "<br />";
echo Route::currentRouteName(); // returns : backend.articles.index
echo "<br />";
//// echo Route::getCurrentRoute()->getPath(); // DOES NOT WORK
//// echo $request->route()->getPath();


if (\Route::current()->getName() == 'dashboard') {
echo "SUCCESS";
}
@endphp --}}

{{--
   Display the result of a query
   dd(DB::getQueryLog());
--}}