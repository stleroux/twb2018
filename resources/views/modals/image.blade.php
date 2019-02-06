{{-- 

   @include('modals.image', [
      'title'=>'Recipe Image',
      'img_path'=>'_recipes',
      'img_name'=>'image',
      'model'=>$recipe
   ])

--}}

<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
            {{-- <h4 class="modal-title" id="printPostModalLabel">Post Image</h4> --}}
            <h4 class="modal-title" id="imageModalLabel">{{ $title }}</h4>
         </div>
         <div class="modal-body">
            <p>
               {{ Html::image($img_path . "/". $model->$img_name, "", array('height'=>'100%','width'=>'100%')) }}
            </p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>