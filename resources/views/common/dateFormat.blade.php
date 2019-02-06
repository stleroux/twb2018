{{--
	Requires Model and Field values
	
	Check the value of the logged in user's dateFormat preference
	If a value is present in the date field($field) of the table($model), then format the date
	Otherwise, display "N/A"
--}}

@if (Auth::check())
	@if (Auth::user()->profile->date_format == 1) {{-- Jan 01, 2017 (Default) --}}
		{{-- {{ $model->$field >= Carbon\Carbon::now() ? 'Greater12' : 'Less' }} --}}
		{{ ($model->$field) ? date('M d, Y', strtotime($model->$field)) : 'N/A' }}
	@elseif (Auth::user()->profile->date_format == 2) {{-- Jan 1, 2017 --}}
		{{ ($model->$field) ? date('M j, Y', strtotime($model->$field)) : 'N/A' }}
	@elseif (Auth::user()->profile->date_format == 3) {{-- 01/01/2017 --}}
		{{ ($model->$field) ? date('m-j-Y', strtotime($model->$field)) : 'N/A' }}
	@elseif (Auth::user()->profile->date_format == 4) {{-- 1/01/2017 --}}
		{{ ($model->$field) ? date('n-j-Y', strtotime($model->$field)) : 'N/A' }}
	@elseif (Auth::user()->profile->date_format == 5) {{-- 01 Jan 2017 --}}
		{{ ($model->$field) ? date('d M Y', strtotime($model->$field)) : 'N/A' }}
	@elseif (Auth::user()->profile->date_format == 6) {{-- 1 Jan 2017 --}}
		{{ ($model->$field) ? date('j M Y', strtotime($model->$field)) : 'N/A' }}
	@elseif (Auth::user()->profile->date_format == 7) {{-- 01/01/2017 --}}
		{{ ($model->$field) ? date('j-m-Y', strtotime($model->$field)) : 'N/A' }}
	@elseif (Auth::user()->profile->date_format == 8) {{-- 1/01/2017 --}}
		{{ ($model->$field) ? date('j-n-Y', strtotime($model->$field)) : 'N/A' }}
	{{-- @elseif (Auth::user()->profile->date_format == 9) --}} {{-- Jan 01, 2017 (12:00:00) --}}
		{{-- {{ ($model->$field) ? date('M d, Y (h:m:s)', strtotime($model->$field)) : 'N/A' }} --}}
	@endif
@else
	{{-- Jan 1, 2017 --}}
	{{ ($model->$field) ? date('M j, Y', strtotime($model->$field)) : 'N/A' }}
@endif