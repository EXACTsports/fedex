<div class="set-print-options flex">
    <div class="w-1/6 relative">
        <ul class="flex flex-col">
            @foreach($printOptions as $index => $printOption)
                <livewire:fedex::print-option :printOption="$printOption" :index="$index" />
            @endforeach
        </ul>
    </div>
    <div class="w-5/6 flex justify-center">
        <div class="shadow-lg w-72 h-96">
            <img src="{{$document['image']}}" />    
        </div>
        <div class="pagination"></div>
    </div>
</div>