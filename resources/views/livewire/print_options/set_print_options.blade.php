<div class="set-print-options flex">
    <div class="w-1/6 relative">
        <ul class="flex flex-col" x-data="{ 
                ...openPrintOptionPanel(), 
                documentIndex: @entangle('documentIndex') 
            }"
        >
            @foreach($printOptions as $index => $printOption)
                <livewire:fedex::print-option x-bind:documentIndex="documentIndex"  :printOption="$printOption" :index="$index" />
            @endforeach
        </ul>
    </div>
    <div class="w-5/6">
        <h1 class="ml-4 mt-4 text-xl font-semibold" x-text="currentDocument.documentName"></h1>
        <div class="flex flex-col justify-center h-screen">
            <div class="preview flex justify-center">
                <div class="shadow-lg w-72 h-96 border-2">
                    <img :src="currentDocument.image" />    
                </div>
                <div class="pagination"></div>
            </div>
            <div class="continue-button mt-5 flex justify-end">
                <button type="button" x-on:click="$wire.cancelSetPrintOptions()" class="bg-red-600 text-white p-3 w-60">CANCEL</button>
                <button type="button" class="bg-purple-900 text-white p-3 w-60 ml-1" 
                    x-on:click="$wire.emit('setNewPrintOptions')">SET OPTIONS</button>
            </div>
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

        function openPrintOptionPanel() {
            return {
                showPrintOption(value, index) {
                    let printOptionPanelLeft = this.$refs.printOptions.offsetWidth; 

                    if (!value) {
                        printOptionPanelLeft = 0;
                    }

                    Livewire.emit("openPrintOptionPanel", value, printOptionPanelLeft, index);
                }
            }
        }
    </script>
@endpush