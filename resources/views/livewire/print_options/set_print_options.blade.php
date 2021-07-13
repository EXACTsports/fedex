<div class="set-print-options flex">
    <div class="w-1/6 relative">
        <ul class="flex flex-col">
            @foreach($printOptions as $index => $printOption)
                <livewire:fedex::print-option :printOption="$printOption" :index="$index" />
            @endforeach
        </ul>
    </div>
    <div class="w-5/6 flex flex-col justify-center h-screen">
        <div class="preview flex justify-center">
            <div class="shadow-lg w-72 h-96">
                <img src="{{$document['image']}}" />    
            </div>
            <div class="pagination"></div>
        </div>
        <div class="continue-button mt-5 flex justify-end">
            <button type="button" class="bg-purple-900 text-white p-3 w-60">CONTINUE</button>
        </div>
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