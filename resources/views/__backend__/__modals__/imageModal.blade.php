{{-- IMAGE MODAL --}}
<div class="modal fade" id="viewImageModal" tabindex="-1" role="dialog" aria-labelledby="viewImageModalLabel">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="printPostModalLabel">Post Image</h4>
         </div>
         <div class="modal-body">
            <p>{{ Html::image("images/posts/" . $post->image, "", array('height'=>'100%','width'=>'100%')) }}</a></p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>