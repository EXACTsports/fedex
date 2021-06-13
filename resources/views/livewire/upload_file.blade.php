<div class="upload-file-wrapper flex">
    <div class="file border-red-50">
        <input type="file" wire:model="file">
    </div>
    <div class="documents border-yellow-900">
        <ul>
            @foreach($documents as $document)
                <li>
                    <div class="flex">
                        <p>{{ $document['fileName'] }}</p>
                        <button type="button" class="bg-blue-400 text-white" wire:click="$emit('convertToPdf', {{ $document['documentId'] }})">SET PRINT OPTIONS</button>
                </li>
            @endforeach
        </ul>
    </div>
</div>