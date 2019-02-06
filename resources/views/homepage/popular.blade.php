<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			<i class="fa fa-star-o" aria-hidden="true"></i>
			Most Popular Items
		</h3>
	</div>
	<div class="panel-body">
		<p>Have a look at the most viewed items on the site.</p>

		<ul class="list-group">
			@if(!empty($popularArticle))
				@foreach ($popularArticle as $a)
					<a class="list-group-item" href="{{ route('articles.show', $a->id) }}" role="button">
						<div class="text text-left">
							<i class="fa fa-file-text-o" aria-hidden="true"></i>
							Article
							<span class="badge pull-right">{{ $a->views }}</span>
						</div>
					</a>
				@endforeach
			@endif

			@if(!empty($popularPost))
				@foreach ($popularPost as $p)
					<a class="list-group-item" href="{{ route('blog.single', $p->slug) }}" role="button">
						<div class="text text-left">
							<i class="fa fa-newspaper-o" aria-hidden="true"></i>
							Blog
							<span class="badge pull-right">{{ $p->views }}</span>
						</div>
					</a>
				@endforeach
			@endif

			@foreach ($popularRecipe as $r)
				<a class="list-group-item" href="{{ route('recipes.show', $r->id) }}" role="button">
					<div class="text text-left">
						<i class="fa fa-address-card-o" aria-hidden="true"></i>
						Recipe
						<span class="badge pull-right">{{ $r->views }}</span>
					</div>
				</a>
			@endforeach

			@foreach ($popularWoodProject as $wp)
				<a class="list-group-item" href="{{ route('woodProjects.show', $wp->id) }}" role="button">
					<div class="text text-left">
						<i class="fa fa-pagelines" aria-hidden="true"></i>
						Wood Project
						<span class="badge pull-right">{{ $wp->views }}</span>
					</div>
				</a>
			@endforeach
		</ul>

	</div>
</div>