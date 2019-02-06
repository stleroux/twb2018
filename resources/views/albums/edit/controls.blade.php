@include('common.controlCenterHeader')

{{--    <button
      type="submit"
      name="action"
      value="save_and_close"
      class="btn btn-default btn-block"
      formmethod="POST"
      >
         Save & Close
   </button>

   <button
      type="submit"
      name="action"
      value="save_and_new"
      class="btn btn-default btn-block"
      formmethod="POST"
      >
         Save & New
   </button>

   <button
      type="submit"
      name="action"
      value="save"
      class="btn btn-default btn-block"
      formmethod="POST"
      >
         Save
   </button> --}}

   {{ Form::button('<i class="fa fa-save"></i> Update Album', ['type'=>'submit', 'class'=>'btn btn-block btn-success']) }}
   
   <a href="{{ route('albums.index') }}" class="btn btn-default btn-block">
      <i class="fa fa-arrow-left" aria-hidden="true"></i>
      Back to Albums
   </a>

   {{ Form::button('<i class="fa fa-refresh"></i> Reset Form', ['type'=>'reset', 'class'=>'btn btn-block btn-default']) }}

@include('common.controlCenterFooter')