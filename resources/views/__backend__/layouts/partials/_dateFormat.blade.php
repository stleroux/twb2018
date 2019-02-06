{{--
   Requires Model and Field values
   
   Check the value of the logged in user's dateFormat preference
   If a value is present in the date field($field) of the table(#model), then format the date
   Otherwise, display "N/A"
--}}

@if (Auth::check())
   @if (Auth::user()->profile->date_format == 1)
   {{-- @if (Session::get('dateFormat') == 1) --}}
      {{-- Jan 01, 2017 --}}
      {{ ($model->$field) ? date('M d, Y', strtotime($model->$field)) : 'N/A' }}
   @elseif (Auth::user()->profile->date_format == 2)
   {{-- @elseif (Session::get('dateFormat') == 2) --}}
      {{-- Jan 1, 2017 --}}
      {{ ($model->$field) ? date('M j, Y', strtotime($model->$field)) : 'N/A' }}
   @elseif (Auth::user()->profile->date_format == 3)
   {{-- @elseif (Session::get('dateFormat') == 3) --}}
      {{-- 01/01/2017 --}}
      {{ ($model->$field) ? date('m-j-Y', strtotime($model->$field)) : 'N/A' }}
   @elseif (Auth::user()->profile->date_format == 4)
   {{-- @elseif (Session::get('dateFormat') == 4) --}}
      {{-- 1/01/2017 --}}
      {{ ($model->$field) ? date('n-j-Y', strtotime($model->$field)) : 'N/A' }}
   @elseif (Auth::user()->profile->date_format == 5)
   {{-- @elseif (Session::get('dateFormat') == 5) --}}
      {{-- 01 Jan 2017 --}}
      {{ ($model->$field) ? date('d M Y', strtotime($model->$field)) : 'N/A' }}
   @elseif (Auth::user()->profile->date_format == 6)
   {{-- @elseif (Session::get('dateFormat') == 6) --}}
      {{-- 1 Jan 2017 --}}
      {{ ($model->$field) ? date('j M Y', strtotime($model->$field)) : 'N/A' }}
   @elseif (Auth::user()->profile->date_format == 7)
   {{-- @elseif (Session::get('dateFormat') == 7) --}}
      {{-- 01/01/2017 --}}
      {{ ($model->$field) ? date('j-m-Y', strtotime($model->$field)) : 'N/A' }}
   @elseif (Auth::user()->profile->date_format == 8)
   {{-- @elseif (Session::get('dateFormat') == 8) --}}
      {{-- 1/01/2017 --}}
      {{ ($model->$field) ? date('j-n-Y', strtotime($model->$field)) : 'N/A' }}
   @endif
@else
   {{-- Jan 1, 2017 --}}
   {{ ($model->$field) ? date('M j, Y', strtotime($model->$field)) : 'N/A' }}
@endif