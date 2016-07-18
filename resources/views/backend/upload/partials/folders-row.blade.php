@foreach ($subfolders as $path => $name)
    <tr>
        <td>
            <a href="/admin/upload?folder={{ $path }}"><i class="material-icons">&#xE2C7;</i> {{ $name }}
            </a>
        </td>
        <td class="uk-text-center">Folder</td>
        <td class="uk-text-center">-</td>
        <td class="uk-text-center">-</td>
        <td class="uk-text-center">
            <a class="delete-folder" data-uk-modal="{target:'#modal-folder-delete'}" data-name="{{ $name }}">
                Delete
            </a>
        </td>
    </tr>
@endforeach