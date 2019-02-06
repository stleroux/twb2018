@include('common.controlCenterHeader')

	@guest
		<a href="{{ route('homepage') }}" class="btn btn-default btn-block">
			<i class="fa fa-home" aria-hidden="true"></i>
			Home
		</a>
	@endguest

	@if(checkACL('author'))
		<a href="{{ route('articles.create') }}" class="btn btn-default btn-block">
			<i class="fa fa-plus-square" aria-hidden="true"></i>
			Add Article
		</a>
	@endif

	@if(checkACL('manager'))
	
		<a href="{{ route('articles.import') }}" class="btn btn-warning btn-block">
			<i class="fa fa-upload" aria-hidden="true"></i>
			Import
		</a>
	
		@include('articles.common.bulkActions', ['buttons'=>['publishAll','unpublishAll','trashAll']])

		<a href="{{ URL::to('articles/downloadExcel/xls') }}" class="btn btn-default btn-block">
			<i class="fa fa-file-excel-o" aria-hidden="true"></i>
			Download All as XLS
		</a>

		<a href="{{ URL::to('articles/downloadExcel/xlsx') }}" class="btn btn-default btn-block">
			<i class="fa fa-file-excel-o" aria-hidden="true"></i>
			Download All as XLSX
		</a>

		<a href="{{ URL::to('articles/downloadExcel/csv') }}" class="btn btn-default btn-block">
			<i class="fa fa-file-text-o" aria-hidden="true"></i>
			Download All as CSV
		</a>

		<a href="{{ route('articles.pdfview') }}" class="btn btn-warning btn-block">
			<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
			Preview All as PDF
		</a>

		<a href="{{ route('articles.pdfview',['download'=>'pdf']) }}" class="btn btn-warning btn-block">
			<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
			Download All to PDF
		</a>

	@endif

@include('common.controlCenterFooter')
