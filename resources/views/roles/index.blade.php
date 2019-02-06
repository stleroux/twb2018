@extends('layouts.app')

@section('title','Roles')

@section('stylesheets')
@stop

@section('sectionSidebar')
	 @include('roles.sidebar')
@stop

@section('breadcrumb')
	 <li><a href="dashboard">Dashboard</a></li>
	 <li><a href="{{ route('roles.index') }}">Roles</a></li>
	 <li class="active"><span>Active Roles</span></li>
@stop

@section('content')
<form style="display:inline;">
{{-- <form method="POST" action="{{ route('recipes.trashAll') }}"> --}}
	 {!! csrf_field() !!}
	 
	@if($roles->count() > 0)
		<div class="panel panel-primary">
			<div class="panel-heading" style="position:relative;">
				<h3 class="panel-title">
					<a href="#" id="popover" data-toggle="popover" data-trigger="hover"
						data-title="Active Roles"
						data-content=".">
						<i class="fa fa-question-circle" aria-hidden="true"></i> Active Roles
					</a>

					{{-- <button
						class="btn btn-xs btn-danger pull-right"
						type="submit"
						formaction="{{ route('recipes.trashAll') }}"
						formmethod="POST"
						id="bulk-delete"
						style="display:none; margin-left:2px"
						onclick="return confirm('Are you sure you want to trash these recipes?')">
						Trash Selected
					</button> --}}
							 
					{{-- <button
						class = "btn btn-xs btn-default pull-right"
						type="submit"
						formaction="{{ route('recipes.unpublishAll') }}"
						formmethod="POST"
						id="bulk-unpublish"
						style="display:none; margin-left:2px"
						onclick="return confirm('Are you sure you want to unpublish these recipes?')">
						Unpublish Selected
					</button> --}}

				</h3>
			</div>
</form>

			<div class="well well-sm text text-center">
				<a href="{{ route('roles.index') }}" class="{{ Request::is('backend/roles') ? "btn-primary": "btn-default" }} btn btn-sm">All</a>
				@foreach($letters as $value)
					<a href="{{ route('roles.index', $value) }}" class="{{ Request::is('backend/roles/'.$value) ? "btn-primary": "btn-default" }} btn btn-sm">{{ strtoupper($value) }}</a>
				@endforeach
			</div>


			<div class="panel-body">
			<table id="datatable" class="table table-hover table-condensed table-responsive">
				<thead>
					<tr>
						<th><input type="checkbox" id="selectall" class="checked" /></th>
						<th>ID</th>
						<th>Internal Name</th>
						<th>Display Name</th>
						<th>Description</th>
						@if(checkACL('author'))
							<th data-orderable="false"></th>
						@endif
					</tr>
				</thead>
				<tbody>
					@foreach ($roles as $role)
						<tr>
							<td>
								<input type="checkbox" onClick="checkbox_is_checked()" name="checked[]" value="{{ $role->id }}" class="check-all">
							</td>
							<td>{{ $role->id }}</td>
							<td>{{ $role->name }}</td>
							<td>{{ $role->display_name }}</td>
							<td>{{ $role->description }}</td>
							@if(checkACL('author'))
								<td class="text-right">
									@include('layouts.partials.actionsDD', [
										'model'=>$role,
										'name'=>'roles',
										'params'=>['edit', 'delete']
									])
								</td>
							@endif
						</tr>
					@endforeach
				</tbody>
				</table>
			</div>
			</div>
			 
	@else
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Roles</h3>
			</div>
			<div class="panel-body">
				<div class="text text-danger">NO RECORDS FOUND</div>
			</div>
		</div>
	@endif
@stop

@section('scripts')
	 <script>

			$(function () {
				 $("#selectall").click(function () {
						if ($("#selectall").is(':checked')) {
							 $("input[type=checkbox]").each(function () {
									$(this).attr("checked", true);
							 });
							 $("#bulk-delete").show();
							 $("#bulk-unpublish").show();
							 $(".selectmenu").hide();

						} else {
							 $("input[type=checkbox]").each(function () {
									$(this).attr("checked", false);
							 });
							 $("#bulk-delete").hide();
							 $("#bulk-unpublish").hide();
							 $(".selectmenu").show();
						}
				 });
			});

			function checkbox_is_checked() {

				 if ($(".check-all:checked").length > 0)
				 {
						$("#bulk-delete").show();
						$("#bulk-unpublish").show();
						$(".selectmenu").hide();
				 }
				 else
				 {
						$("#bulk-delete").hide();
						$("#bulk-unpublish").hide();
						$(".selectmenu").show();
				 }
			};

	 </script>

@stop