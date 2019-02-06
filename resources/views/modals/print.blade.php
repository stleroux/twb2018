{{-- 

   @include('modals.print', [
      'title'=>'Print',
      'name'=>'recipes',
      'model'=>$recipe
   ])

--}}

<div class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-labelledby="printModalLabel">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="printModalLabel">{{ $title }} {{ ucfirst(str_singular($name)) }}</h4>
         </div>
         <div class="modal-body">
            <p>To print this {{ str_singular($name) }}, please use your browser's print functionality.</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
            <a href="{{ route($name . '.print', $model->id) }}" class="btn btn-sm btn-default">
               <div class="text text-left">
                  <i class="fa fa-print" aria-hidden="true"></i> Proceed
               </div>
            </a>
         </div>
      </div>
   </div>
</div>