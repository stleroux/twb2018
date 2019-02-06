<div class="panel-group" id="accordion">
	<div class="panel panel-primary">

		<div class="panel-heading">
			<a href="{{ route('backend.articles.index') }}" style="text-decoration: none; color:white;">
				<h4 class="panel-title">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
						Articles
						<div class="badge pull-right">
							{{ App\Article::count() }}
						</div>
				</h4>
			</a>
		</div>

		<div class="list-group">

			@if(checkACL('author'))
				<a href="{{ route('backend.articles.newArticles') }}" class="list-group-item {{ Nav::isRoute('backend.articles.newArticles') }}">
					<i class="fa fa-file-text-o" aria-hidden="true"></i>
					New Articles
					<div class="badge pull-right">
						{{ App\Article::newArticles()->count() }}
					</div>
				</a>
			@endif

			@if(checkACL('user'))
				<a href="{{ route('backend.articles.published') }}" class="list-group-item {{ Nav::isRoute('backend.articles.published') }} ">
					<i class="fa fa-file-text-o" aria-hidden="true"></i>
					Published
					<div class="badge pull-right">
						{{ App\Article::published()->count() }}
					</div>
				</a>
			@endif

			@if(checkACL('author'))
				<a href="{{ route('backend.articles.myArticles') }}" class="list-group-item {{ Nav::isRoute('backend.articles.myArticles') }}">
					<i class="fa fa-file-text-o" aria-hidden="true"></i>
					Created By Me
					<div class="badge pull-right">
						{{ App\Article::myArticles()->count() }}
					</div>
				</a>
			@endif

			@if(checkACL('user'))
				<a href="{{ route('backend.articles.myFavorites') }}" class="list-group-item {{ Nav::isRoute('backend.articles.myFavorites') }}">
					<i class="fa fa-file-text-o" aria-hidden="true"></i>
					My Favorites
					<div class="badge pull-right">
						?
					</div>
				</a>
			@endif

			@if(checkACL('publisher'))
				<a href="{{ route('backend.articles.unpublished') }}" class="list-group-item {{ Nav::isRoute('backend.articles.unpublished') }}">
					<i class="fa fa-file-text-o" aria-hidden="true"></i>
					Unpublished
					<div class="badge pull-right">
						{{ App\Article::unpublished()->count() }}
					</div>
				</a>
			@endif
			
			@if(checkACL('publisher'))
				<a href="{{ route('backend.articles.future') }}" class="list-group-item {{ Nav::isRoute('backend.articles.future') }}">
					<i class="fa fa-file-text-o" aria-hidden="true"></i>
					Future
					<div class="badge pull-right">
						{{ App\Article::future()->count() }}
					</div>
				</a>
			@endif

			@if(checkACL('manager'))
				<a href="{{ route('backend.articles.trashed') }}" class="list-group-item {{ Nav::isRoute('backend.articles.trashed') }}">
					<i class="fa fa-trash-o" aria-hidden="true"></i>
					Trashed
					<div class="badge pull-right">
						{{ App\Article::trashedCount()->count() }}
					</div>
				</a>
			@endif

			@if(checkACL('author'))
				<a href="{{ route('backend.articles.create') }}" class="list-group-item {{ Nav::isRoute('backend.articles.create') }}">
					<i class="fa fa-plus-square" aria-hidden="true"></i>
					Add Article
				</a>
			@endif

			@if(checkACL('manager'))
				<a href="{{ route('backend.articles.import') }}" class="list-group-item {{ Nav::isRoute('backend.articles.import') }}">
					<i class="fa fa-upload" aria-hidden="true"></i>
					Import
				</a>
			@endif

		</div>
	</div>

	@if(checkACL('manager'))
		{{-- Only show this menu if you are on the following pages --}}
		@if(
			Route::currentRouteName() == 'backend.articles.newArticles' || 
			Route::currentRouteName() == 'backend.articles.published' || 
			Route::currentRouteName() == 'backend.articles.myArticles' || 
			Route::currentRouteName() == 'backend.articles.myFavorites' || 
			Route::currentRouteName() == 'backend.articles.unpublished' || 
			Route::currentRouteName() == 'backend.articles.future' || 
			Route::currentRouteName() == 'backend.articles.trashed'
		)
			<div class="panel panel-primary">
			   <div class="panel-heading">
			      <h4 class="panel-title">
			         <a data-toggle="collapse" data-parent="#accordion" href="#collapseOptions" style="display: block; text-decoration: none;">
			            <i class="fa fa-file-text" aria-hidden="true"></i>
			            Options
			            <span class="badge pull-right">
			               <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
			               <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
			            </span>
			         </a>
			      </h4>
			   </div>

			   <div id="collapseOptions" class="panel-collapse collapse">
			      <a href="{{ URL::to('backend/articles/downloadExcel/xls') }}" class="list-group-item">
					<i class="fa fa-file-excel-o" aria-hidden="true"></i>
					Download All as XLS
				</a>

				<a href="{{ URL::to('backend/articles/downloadExcel/xlsx') }}" class="list-group-item">
					<i class="fa fa-file-excel-o" aria-hidden="true"></i>
					Download All as XLSX
				</a>

				<a href="{{ URL::to('backend/articles/downloadExcel/csv') }}" class="list-group-item">
					<i class="fa fa-file-text-o" aria-hidden="true"></i>
					Download All as CSV
				</a>

				<a href="{{ route('backend.articles.pdfview') }}" class="list-group-item {{ Nav::isRoute('backend.articles.pdfview') }}">
					<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
					Preview All as PDF
				</a>

				<a href="{{ route('backend.articles.pdfview',['download'=>'pdf']) }}" class="list-group-item">
					<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
					Download All to PDF
				</a>
			   </div> {{-- End of CollapseReports --}}
			</div>
		@endif
	@endif

</div>
