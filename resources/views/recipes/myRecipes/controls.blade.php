@include('common.controlCenterHeader')
		
	<a href="/" class="btn btn-default btn-block">
		<i class="fa fa-home" aria-hidden="true"></i> Home
	</a>

	@if(checkACL('user'))
		<a href="{{ route('recipes.index') }}" class="btn btn-block btn-default">
			<i class="fa fa-address-card-o" aria-hidden="true"></i>
			All Recipes
		</a>

		<a href="{{ route('recipes.myFavorites') }}" class="btn btn-block btn-default">
			<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
			My Favorites
		</a>
	@endif
	
	@if(checkACL('author'))
		<a href="{{ route('recipes.myRecipes') }}" class="btn btn-block btn-primary">
			<i class="fa fa-list" aria-hidden="true"></i>
			My Recipes
		</a>
	@endif

	@include('recipes.common.bulkActions', ['buttons'=>['unpublishAll','trashAll']])
	
	@if(checkACL('author'))
		<a href="{{ route('recipes.create') }}" class="btn btn-default btn-block">
			<i class="fa fa-plus-square" aria-hidden="true"></i>
			Add Recipe
		</a>
	@endif

	@if(checkACL('manager'))
	
		<a href="{{ route('recipes.import') }}" class="btn btn-warning btn-block">
			<i class="fa fa-upload" aria-hidden="true"></i>
			Import
		</a>
	
		{{-- @include('recipes.common.bulkActions', ['buttons'=>['unpublishAll','trashAll']]) --}}

		<a href="{{ URL::to('recipes/downloadExcel/xls') }}" class="btn btn-default btn-block">
			<i class="fa fa-file-excel-o" aria-hidden="true"></i>
			Download All as XLS
		</a>

		<a href="{{ URL::to('recipes/downloadExcel/xlsx') }}" class="btn btn-default btn-block">
			<i class="fa fa-file-excel-o" aria-hidden="true"></i>
			Download All as XLSX
		</a>

		<a href="{{ URL::to('recipes/downloadExcel/csv') }}" class="btn btn-default btn-block">
			<i class="fa fa-file-text-o" aria-hidden="true"></i>
			Download All as CSV
		</a>

		<a href="{{ route('recipes.pdfview') }}" class="btn btn-warning btn-block">
			<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
			Preview All as PDF
		</a>

		<a href="{{ route('recipes.pdfview',['download'=>'pdf']) }}" class="btn btn-warning btn-block">
			<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
			Download All to PDF
		</a>

	@endif
	
@include('common.controlCenterFooter')