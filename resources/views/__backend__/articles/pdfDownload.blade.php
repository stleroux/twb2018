<table border="0" cellpadding="0" cellspacing="0">
	<thead>
		<tr style="background-color: #C0C0C0">
			<td colspan="2">Articles</td>
		</tr>
	</thead>
	<tbody>
		
		@foreach ($articles as $key => $article)
			<tr>
				<td>
					<table border="1" cellpadding="0" cellspacing="0" width="100%">
						<tr>
							<td width="15%" style="background-color: lightgrey">No</td>
							<td>{{ ++$key }}</td>
						</tr>
						<tr>
							<td nowrap="nowrap" style="vertical-align: text-top; background-color: lightgrey;">Title</td>
							<td>{!! $article->title !!}</td>
						</tr>
						<tr>
							<td nowrap="nowrap" style="vertical-align: text-top; background-color: lightgrey;">Description (En)</td>
							<td>{!! $article->description_eng !!}</td>
						</tr>
						<tr>
							<td nowrap="nowrap" style="vertical-align: text-top; background-color: lightgrey;">Description (Fr)</td>
							<td>
								@if($article->description_fre)
									{!! $article->description_fre !!}
								@else
									N/A
								@endif
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
		@endforeach
	</tbody>
</table>
