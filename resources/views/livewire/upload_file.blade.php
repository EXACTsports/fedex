<div class="upload-file-wrapper flex">
    <div class="file border-red-50">
        <input type="file" wire:model="file">
    </div>
    <div class="documents border-yellow-900">
        <ul>
            @foreach($documents as $document)
                <li>{{ $document }}</li>
            @endforeach
        <ul>
    </div>
</div>