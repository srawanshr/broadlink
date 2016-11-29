@foreach ($files as $file)
    <tr>
        <td>
            <a href="{{ $file['webPath'] }}" target="_blank">
                @if (is_image($file['mimeType']))
                    <i class="material-icons">&#xE3F4;</i>
                @else
                    <i class="material-icons">&#xE24D;</i>
                @endif
                &nbsp;{{ $file['name'] }}
            </a>
        </td>
        <td class="uk-text-center">{{ $file['mimeType'] or 'Unknown' }}</td>
        <td class="uk-text-center">{{ human_filesize($file['size']) }}</td>
        <td class="uk-text-center">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $file['modified'])->format('M d, Y') }}</td>
        <td class="uk-text-center">
            @if (is_image($file['mimeType']))
                <a href="{{ $file['webPath'] }}" data-uk-lightbox="{group:'file'}">
                    Preview
                </a>&nbsp;|&nbsp;
            @endif
            <a class="delete-file" data-uk-modal="{target:'#modal-file-delete'}" data-name="{{ $file['name'] }}">
                Delete
            </a>
        </td>
    </tr>
@endforeach