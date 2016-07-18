<div class="uk-modal" id="modal-folder-delete">
    <div class="uk-modal-dialog">
        <div class="uk-modal-header">
            <h3 class="uk-modal-title">Delete this folder?</h3>
        </div>
        <p>Are you sure you want to delete the folder <b><span id="delete-folder-name1"></span></b>?</p>
        <form method="POST" action="/admin/upload/folder">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="folder" value="{{ $folder }}">
            <input type="hidden" name="del_folder" id="delete-folder-name2">
            <div class="uk-modal-footer uk-text-right">
                <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                <button type="submit" class="md-btn md-btn-flat md-btn-flat-primary">OK</button>
            </div>
        </form>
    </div>
</div>