<div style="{{ $openPrintOptionPanelStyle }}" componentIndex="{{$componentIndex}}" index="{{$index}}"  
    class="print-option-panel  print-option-panel absolute bg-gray-100 w-72 min-h-3/4 top-0 -z-10 shadow-lg">
    <ul>
        @foreach($printOptions as $printOption)
        <li class="bg-white p-7 cursor-pointer border-b-2" wire:click="selectPrintOption('testing')">
            {{ $printOption }}
        </li>
        @endforeach
    </ul>
</div>