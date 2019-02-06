
<a href="" data-toggle="modal" data-target="#viewImageModal">
	{{ Html::image("images/".$name."/" . $model->image, "", array('height'=>'150','width'=>'175')) }}
</a>

@include('modals.image', ['model'=>$model, 'name'=>$name])