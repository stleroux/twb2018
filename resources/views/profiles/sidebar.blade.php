	<div class="panel panel-primary">

		<div class="panel-heading">
			<h4 class="panel-title"><i class="fa fa-id-card-o" aria-hidden="true"></i> Manage Account</h4>
		</div>

		<div class="list-group">

			<a href="{{ route('backend.profile', $user->profile->id) }}"
					class="list-group-item
							{{ Nav::isRoute('backend.profile') }}
							">
				<i class="fa fa-id-card-o" aria-hidden="true"></i>
				My Account
			</a>

{{--       <a href="{{ route('profile', Auth::user()->id) }}"
					class="list-group-item
							{{ Nav::isRoute('profile.edit') }}
							">
				<i class="fa fa-id-card-o" aria-hidden="true"></i>
				Edit Profile / Account
			</a> --}}

{{--       <a href="{{ route('profile.edit', Auth::user()->id) }}"
					class="list-group-item
							{{ Nav::isRoute('user.edit') }}
							">
				<i class="fa fa-id-card-o" aria-hidden="true"></i>
				Edit Account
			</a> --}}

{{--       <a href="{{ route('changePassword') }}"
					class="list-group-item
							{{ Nav::isRoute('changePassword') }}
							">
				<i class="fa fa-id-card-o" aria-hidden="true"></i>
				Change Password
			</a> --}}

{{--       <a href="{{ route('backend.articles.myFavorites') }}"
					class="list-group-item
							{{ Nav::isRoute('backend.articles.myFavorites') }}
							">
				<i class="fa fa-id-card-o" aria-hidden="true"></i>
				My Favorites
			</a> --}}

{{--       <a href="{{ route('backend.articles.unpublished') }}"
					class="list-group-item
							{{ Nav::isRoute('backend.articles.unpublished') }}
							">
				<i class="fa fa-id-card-o" aria-hidden="true"></i>
				Unpublished
			</a> --}}
			
{{--       <a href="{{ route('backend.articles.future') }}"
					class="list-group-item
								{{ Nav::isRoute('backend.articles.future') }}
								">
				<i class="fa fa-id-card-o" aria-hidden="true"></i>
				Future
			</a> --}}

{{--       <a href="{{ route('backend.articles.trashed') }}"
					class="list-group-item
								{{ Nav::isRoute('backend.articles.trashed') }}
								">
				<i class="fa fa-trash-o" aria-hidden="true"></i>
				Trashed
			</a> --}}

{{--       <a href="{{ route('backend.articles.create') }}" class="list-group-item {{ Nav::isRoute('backend.articles.create') }}">
				<i class="fa fa-plus-square" aria-hidden="true"></i>
				Add New
			</a> --}}

{{--       <a href="{{ route('backend.articles.import') }}" class="list-group-item {{ Nav::isRoute('backend.articles.import') }}">
				<i class="fa fa-upload" aria-hidden="true"></i>
				Import
			</a> --}}

{{--       <a href="{{ URL::to('backend/articles/downloadExcel/xls') }}" class="list-group-item">
				<i class="fa fa-file-excel-o" aria-hidden="true"></i>
				Download All as XLS
			</a> --}}

{{--       <a href="{{ URL::to('backend/articles/downloadExcel/xlsx') }}" class="list-group-item">
				<i class="fa fa-file-excel-o" aria-hidden="true"></i>
				Download All as XLSX
			</a> --}}

{{--       <a href="{{ URL::to('backend/articles/downloadExcel/csv') }}" class="list-group-item">
				<i class="fa fa-file-text-o" aria-hidden="true"></i>
				Download All as CSV
			</a> --}}

{{--       <a href="{{ route('backend.articles.pdfview') }}" class="list-group-item {{ Nav::isRoute('backend.articles.pdfview') }}">
				<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
				Preview All as PDF
			</a> --}}

{{--       <a href="{{ route('backend.articles.pdfview',['download'=>'pdf']) }}" class="list-group-item">
				<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
				Download All to PDF
			</a> --}}

		</div>

	</div>
