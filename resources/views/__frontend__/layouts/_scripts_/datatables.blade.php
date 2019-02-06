<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

{{-- Datatables --}}
<script type="text/javascript">
		$(document).ready(function() {

				$('body .dropdown-toggle').dropdown();
				
				// Setup DataTable Defaults
				$.extend( $.fn.dataTable.defaults, {
				 fnInitComplete: function(oSettings, json) {
				 
					// Add "Clear Filter" button to Filter
					var btnClear = $('<button class="btnClearDataTableFilter">X</button>');
					btnClear.appendTo($('#' + oSettings.sTableId).parents('.dataTables_wrapper').find('.dataTables_filter'));
					$('#' + oSettings.sTableId + '_wrapper .btnClearDataTableFilter').click(function () {
					 $('#' + oSettings.sTableId).dataTable().fnFilter('');
					});
				 }
				});


				$('#datatable').DataTable( {
						searchHighlight: true,
						dom: 
							"<'row'<'col-xs-6'l><'col-xs-6 text-center'B><'col-xs-6 text-right'f>>" +
							"<'row'<'col-xs-12 col-sm-12'tr>>" +
							"<'row'<'col-xs-12 text-center'ip>>",
						"autoWidth": false,
						pagingType: "full_numbers",
						//"bSort": false,
						"order": [],
						oLanguage: {
								oPaginate: {
										sFirst: 'First',
										sPrevious: 'Previous',
										sNext: 'Next',
										sLast: 'Last'
								},
						},
						stateSave: true,
						"columnDefs": [{
								"targets": 'no-sort',
								"orderable": false,
						}],
						<?php if (Auth::check()) { ?>
							"lengthMenu": [[<?php echo Auth::user()->profile->rows_per_page; ?>, 5, 10, 15, 20, 25, 50, 100], [<?php echo Auth::user()->profile->rows_per_page; ?>, 5, 10, 15, 20, 25, 50, 100]],
							"pageLength": <?php echo Auth::user()->profile->rows_per_page; ?>
						<?php } else { ?>
							"lengthMenu": [[5, 10, 15, 25], [5, 10, 15, 25]],
							"pageLength": 10
						<?php } ?>
				});
		} );
</script>
