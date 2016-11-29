<table class="table table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Icon</th>
        <th class="text-right">Actions</th>
    </tr>
    </thead>
    <tbody>
    @if($testimonials->isEmpty())
        <tr>
            <td class="text-center" colspan="5">No data available.</td>
        </tr>
    @else
        @foreach($testimonials as $key=>$testimonial)
            <tr>
                <td>{{$key+1}}</td>
                <td><img src="{{$testimonial->customer->image->thumbnail}}"
                         alt="{{$testimonial->customer->dislay_name}}" class="img-circle width-1"></td>
                <td>{{$testimonial->customer->display_name}}</td>
                <td class="text-right">
                    @if(Auth::user()->canOne(['delete.cms', 'update.cms', 'publish.cms']))
                        {!! Form::open(['route'=>['admin.testimonial.destroy', $testimonial->id], 'method'=>'DELETE'])!!}
                        @permission('update.cms')
                        <a href="{{route('admin.testimonial.edit', $testimonial->id)}}" class="btn btn-icon-toggle"
                           data-toggle="tooltip" data-placement="top" data-original-title="Edit testimonial"><i
                                    class="fa fa-pencil"></i></a>
                        @endpermission
                        @permission('delete.cms')
                        <button type="submit" onClick="return confirm('Are you sure?');" class="btn btn-icon-toggle"
                                data-toggle="tooltip" data-placement="top" data-original-title="Delete testimonial"><i
                                    class="fa fa-trash-o"></i></button>
                        @endpermission
                        {!! Form::close() !!}
                        @permission('publish.cms')
                        {!! Form::open(['route'=>['admin.misc.publish', class_basename($testimonial), $testimonial->id], 'method'=>'POST'])!!}
                        <button type="button" class="btn btn-icon-toggle btn-confirm-submit"
                                data-message="{{ $testimonial->is_published ? 'Unpublish' : 'Publish' }} this {{ class_basename($testimonial) }} ?"
                                data-toggle="tooltip" data-placement="top"
                                data-original-title="{{ $testimonial->is_published ? 'Unpublish' : 'Publish' }}">
                            <i class="fa fa-{{ $testimonial->is_published ? 'times' : 'check' }}"></i></button>
                        {!! Form::close() !!}
                        @endpermission
                    @else
                        <em>NA</em>
                    @endif
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
