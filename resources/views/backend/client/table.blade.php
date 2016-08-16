<table class="table table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Logo</th>
        <th>Name</th>
        <th class="text-right">Actions</th>
    </tr>
    </thead>
    <tbody>
    @if($clients->isEmpty())
        <tr>
            <td class="text-center" colspan="5">No data available.</td>
        </tr>
    @else
        @foreach($clients as $key=>$client)
            <tr>
                <td>{{$key+1}}</td>
                <td><img src="{{$client->image->thumbnail}}" class="img-circle width-1"></td>
                <td>{{$client->name}}</td>
                <td class="text-right">
                    @if(Auth::user()->canOne(['delete.cms', 'update.cms', 'publish.cms']))
                        {!! Form::open(['route'=>['admin.client.destroy', $client->slug], 'method'=>'DELETE'])!!}
                            @permission('update.cms')
                                <a href="{{route('admin.client.edit', $client->slug)}}" class="btn btn-icon-toggle"
                                   data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i
                                            class="fa fa-pencil"></i></a>
                            @endpermission
                            @permission('delete.cms')
                                <button type="submit" onClick="return confirm('Are you sure?');" class="btn btn-icon-toggle"
                                        data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i
                                            class="fa fa-trash-o"></i></button>
                            @endpermission
                        {!! Form::close() !!}
                        @permission('publish.cms')
                            {!! Form::open(['route'=>['admin.misc.publish', class_basename($client), $client->id], 'method'=>'POST'])!!}
                            <button type="button" class="btn btn-icon-toggle btn-confirm-submit"
                                    data-message="{{ $client->is_published ? 'Unpublish' : 'Publish' }} this {{ class_basename($client) }} ?"
                                    data-toggle="tooltip" data-placement="top"
                                    data-original-title="{{ $client->is_published ? 'Unpublish' : 'Publish' }}">
                                <i class="fa fa-{{ $client->is_published ? 'times' : 'check' }}"></i></button>
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
