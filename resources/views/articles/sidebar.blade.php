@if(checkACL('user'))
	<div class="panel-group" id="accordion">
		<div class="panel panel-primary">
		
			<div class="panel-heading">
				<h4 class="panel-title">
					Module Menu
				</h4>
			</div>

			<div class="list-group">

				@if(checkACL('user'))
					<a href="{{ route('articles.index') }}" class="list-group-item {{ Nav::isRoute('articles.index') }}">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
						Articles
						<div class="badge pull-right">
							{{ App\Article::published()->count() }}
						</div>
					</a>
				@endif

				@if(checkACL('author'))
					<a href="{{ route('articles.newArticles') }}" class="list-group-item {{ Nav::isRoute('articles.newArticles') }}">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
						New Articles
						<div class="badge pull-right">
							{{ App\Article::newArticles()->count() }}
						</div>
					</a>
				@endif

				@if(checkACL('author'))
					<a href="{{ route('articles.myArticles') }}" class="list-group-item {{ Nav::isRoute('articles.myArticles') }}">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
						Created By Me
						<div class="badge pull-right">
							{{ App\Article::myArticles()->count() }}
						</div>
					</a>
				@endif

				@if(checkACL('user'))
					<a href="{{ route('articles.myFavorites') }}" class="list-group-item {{ Nav::isRoute('articles.myFavorites') }}">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
						My Favorites
						<div class="badge pull-right">
							{{ DB::table('article_user')->where('user_id','=',Auth::user()->id)->count() }}
						</div>
					</a>
				@endif

				@if(checkACL('publisher'))
					<a href="{{ route('articles.unpublished') }}" class="list-group-item {{ Nav::isRoute('articles.unpublished') }}">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
						Unpublished
						<div class="badge pull-right">
							{{ App\Article::unpublished()->count() }}
						</div>
					</a>
				@endif
				
				@if(checkACL('publisher'))
					<a href="{{ route('articles.future') }}" class="list-group-item {{ Nav::isRoute('articles.future') }}">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
						Future
						<div class="badge pull-right">
							{{ App\Article::future()->count() }}
						</div>
					</a>
				@endif

				@if(checkACL('manager'))
					<a href="{{ route('articles.trashed') }}" class="list-group-item {{ Nav::isRoute('articles.trashed') }}">
						<i class="fa fa-trash-o" aria-hidden="true"></i>
						Trashed
						<div class="badge pull-right">
							{{ App\Article::trashedCount()->count() }}
						</div>
					</a>
				@endif

			</div>
		</div>


		{{-- @if(checkACL('manager')) --}}
			{{-- Only show this menu if you are on the following pages --}}
{{-- 			@if(
				(Route::currentRouteName() == 'articles.newArticles' && App\Article::newArticles()->count() > 0) || 
				(Route::currentRouteName() == 'articles.index' && App\Article::published()->count() > 0) || 
				(Route::currentRouteName() == 'articles.myArticles' && App\Article::myArticles()->count() > 0) || 
				(Route::currentRouteName() == 'articles.myFavorites' && DB::table('article_user')->where('user_id','=',Auth::user()->id)->count() > 0)|| 
				(Route::currentRouteName() == 'articles.unpublished' && App\Article::unpublished()->count() > 0) || 
				(Route::currentRouteName() == 'articles.future' && App\Article::future()->count() > 0) || 
				(Route::currentRouteName() == 'articles.trashed' && App\Article::trashedCount()->count() > 0)
			)
			<br />
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

				   <div id="collapseOptions" class="panel-collapse collapse"> --}}
					   {{-- <a href="{{ URL::to('backend/articles/downloadExcel/xls') }}" class="list-group-item">
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

						<a href="{{ route('articles.pdfview') }}" class="list-group-item {{ Nav::isRoute('articles.pdfview') }}">
							<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
							Preview All as PDF
						</a>

						<a href="{{ route('articles.pdfview',['download'=>'pdf']) }}" class="list-group-item">
							<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
							Download All to PDF
						</a> --}}
				   {{-- </div> --}} {{-- End of CollapseReports --}}
				{{-- </div>
			@endif
			<br /><br />
		@endif --}}

	</div>
@endif
