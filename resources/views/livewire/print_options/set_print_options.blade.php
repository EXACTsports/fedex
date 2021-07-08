<div class="set-print-options flex">
    <div class="w-1/6 relative">
        <ul class="flex flex-col">
            @foreach($printOptions as $index => $printOption)
                <livewire:fedex::print-option :printOption="$printOption" :index="$index" />
            @endforeach
        </ul>
    </div>
</div>