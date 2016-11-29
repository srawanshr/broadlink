<div class="uk-modal" id="modal-folder-create">
    <div class="uk-modal-dialog">
        <div class="uk-modal-header">
            <h3 class="uk-modal-title">Create a new folder</h3>
        </div>
        <form method="POST" action="/admin/upload/folder" id="folderCreate">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="folder" value="{{ $folder }}">
            <div class="uk-grid" data-uk-grid-margin data-uk-grid="{gutter:16}">
                <div class="uk-width-1-1">
                    <div class="md-input-wrapper">
                        <label>Folder Name</label>
                        <input type="text" id="new_folder_name" name="new_folder" class="md-input" >
                        <span class="md-input-bar"></span>
                    </div>
                </div>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                <button type="submit" class="md-btn md-btn-flat md-btn-flat-primary">Create</button>
            </div>
        </form>
    </div>
</div>