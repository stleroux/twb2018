<div class="panel panel-primary">

   <div class="panel-heading">
      <h4 class="panel-title">
         <i class="fa fa-list" aria-hidden="true"></i>
         Items
      </h4>
   </div>

   <div class="list-group">

      <a href="{{ route('items.index') }}"
         class="list-group-item
            {{ Nav::isRoute('items.index') }}
            {{ Nav::isRoute('items.edit') }}">
         <i class="fa fa-list" aria-hidden="true"></i>
         Items
      </a>

      @if(checkACL('manager'))
         <a href="{{ route('items.import') }}" class="list-group-item {{ Nav::isRoute('items.import') }}">
            <i class="fa fa-upload" aria-hidden="true"></i>
            Import
         </a>
      @endif

   </div>

</div>