{{-- <div class="panel panel-default">
   <div class="panel-heading">
      <h3 class="panel-title">
         <i class="fa fa-question-circle" aria-hidden="true"></i>
         Help
      </h3>
   </div>
   <div class="panel-body">
      <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#help">
         <i class="fa fa-question-circle" aria-hidden="true"></i>
         Help
      </button>
      <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#guide">
         <i class="fa fa-book" aria-hidden="true"></i>
         User Guide
      </button>
   </div>
</div> --}}


<!-- HELP MODAL -->
<div id="help" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title panel-danger">Articles</h4>
         </div>
         <div class="modal-body">
            <p>My favorited articles.</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>

<!-- USER GUIDE MODAL -->
{{-- <div id="guide" class="modal modal-full fade" role="dialog">
   <div class="modal-dialog modal-dialog-full">
      <!-- Modal content-->
      <div class="modal-content modal-content-full">
         <div class="modal-header modal-header-full">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title modal-title-full">USER GUIDE - Articles</h4>
         </div>
         <div class="modal-body modal-body-full">
            @include('userGuide.articles.articles')
         </div>
         <div class="modal-footer modal-footer-full">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
 --}}