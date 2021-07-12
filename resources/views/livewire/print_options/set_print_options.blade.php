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
@push('scripts')
    <script>
        Spruce.store('menuAccordion', {
            tab: 0,
        });

        const menuAccordion = (idx) => ({
            handleClick() {
                this.$store.menuAccordion.tab = this.$store.menuAccordion.tab === idx ? 0 : idx;
            },
            handleRotate() {
                return this.$store.menuAccordion.tab === idx ? 'rotate-180' : '';
            },
            handleToggle() {
                return this.$store.menuAccordion.tab === idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
            }
        });
        function openPrintOptionPanel(e, value, index) {
            let printOptionPanelLeft = e.srcElement.offsetWidth; 

            if (!value) {
                printOptionPanelLeft = 0;
            }

            Livewire.emit("openPrintOptionPanel", value, printOptionPanelLeft, index);
        }
    </script>
@endpush