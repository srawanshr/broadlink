<div class="uk-modal" id="modal-file-upload">
    <div class="uk-modal-dialog">
        <div class="uk-modal-header">
            <h3 class="uk-modal-title">Upload a File</h3>
        </div>
        <form method="POST" action="/admin/upload/file" enctype="multipart/form-data" id="fileCreate">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="folder" value="{{ $folder }}">
            <div class="uk-grid" data-uk-grid-margin data-uk-grid="{gutter:16}">
                <div class="uk-width-1-1">
                    <input type="file" name="file" id="file" class="dropify" />
                </div>
                <div class="uk-width-1-1">
                    <div class="md-input-wrapper md-input-filled">
                        <label>File Name</label>
                        <input type="text" id="file_name" name="file_name" class="md-input label-fixed" placeholder="(Optional)" >
                        <span class="md-input-bar"></span>
                    </div>
                </div>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                <button type="submit" class="md-btn md-btn-flat md-btn-flat-primary">Upload</button>
            </div>
        </form>
    </div>
</div>