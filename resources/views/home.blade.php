@extends('backend.layout')

@section('plugin-css')
    <link href="{{ asset('backend/global/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/global/plugins/dropzone/basic.min.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
<form id="my-dropzone" class="dropzone dropzone-file-area" action="/test/upload" class="dropzone" data-max-files="5">
    {!! csrf_field() !!}
</form>
@stop

@section('plugin-js')
    <script src="{{ asset('backend/global/plugins/dropzone/dropzone.min.js') }}" type="text/javascript"></script>
@stop

@section('unique-js')
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        var dropzoneOptions = {
            maxFiles: $('dropzone').data('max-files') ?: 5,
            init: function() {
                this.on("success", function(file) {
                    
                });
                this.on("queuecomplete", function() {
                    alert('Uploads completed!');
                });
            }
        }        
    </script>
@stop