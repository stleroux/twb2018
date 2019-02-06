<table class="table table-condensed table-hover">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>New Name</th>
                  <th>Size</th>
                  <th>Description</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
               @foreach( $images as $image )
                  <tr>
                     <td>{{ $image->id }}</td>
                     <td>{{ $image->new_name }}</td>
                     <td>{{ $image->size }}</td>
                     <td>{{ $image->description }}</td>
                     <td>
                        <span class="pull-right">
                           <a href="{{ route('woodProjectImages.show', $image->id) }}" class="btn btn-sm btn-default">View</a>
                           <a href="#" class="btn btn-sm btn-default">Edit</a>
                           {!! Form::open(['action' => ['WoodProjectImagesController@destroy', $image->id], 'method'=>'POST', 'style'=>'display:inline;', 'onsubmit' => 'return confirm("Are you sure you want to delete this image?")']) !!}
                              {{ Form::hidden('_method', 'DELETE') }}
                              {!! Form::submit('Delete Image', ['class'=>'btn btn-sm btn-danger']) !!}
                           {{ Form::close() }}
                        </span>
                     </td>
                  </tr>
               @endforeach
            </tbody>
         </table>