@include('common.controlCenterHeader')

      {{ Form::button('<i class="fa fa-save"></i> Save Article', ['type'=>'submit', 'class'=>'btn btn-sm btn-block btn-success']) }}
		{{ Form::button('<i class="fa fa-refresh"></i> Reset Form', ['type'=>'reset', 'class'=>'btn btn-sm btn-block btn-default']) }}
      
@include('common.controlCenterFooter')