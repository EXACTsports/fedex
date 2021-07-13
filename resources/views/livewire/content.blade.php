<div class="content-wrapper" x-cloak 
    @click="closeOpenedPanel($event)"
    x-data="{ 
        showUploadFileComponent: @entangle('showUploadFileComponent'), 
        showSetPrintOptionsComponent: @entangle('showSetPrintOptionsComponent'),
        showCart: @entangle('showCart'),
        showDeliveryOptions: @entangle('showDeliveryOptions'),
        showCheckout: @entangle('showCheckout'),
        showLoader: @entangle('showLoader'),
    }"
>   
    <div x-show="showLoader" class="w-full h-full fixed block top-0 left-0 bg-white opacity-75 z-50">
        <span class="text-purple-900 opacity-75 top-1/2 my-0 mx-auto block relative w-0 h-0" style="
            top: 50%;
        ">
            <i class="fas fa-circle-notch fa-spin fa-3x"></i>
        </span>
    </div>
        
    <!-- BEING UPLOAD FILE COMPONENT -->
    <div x-show="showUploadFileComponent">
        <livewire:fedex::upload-file :documents="$documents" />
    </div>
    <!-- END UPLOAD FILE COMPONENT -->

    <!-- BEGIN SET PRINT OPTIONS COMPONENT -->
    <div x-show="showSetPrintOptionsComponent">
        <livewire:fedex::set-print-options />
    </div>
    <!-- END PRINT OPTIONS COMPONENT -->

    <!-- BEGING CHECKOUT -->
    <div x-show="showCheckout">
        <livewire:fedex::checkout :documents="$documents" />
    </div>
    <!-- END CHEKOUT -->
</div>
@push('scripts')
    <script>
        /**
         * Opens print option panel
         */
        function closeOpenedPanel(e) {
            if (e.target.id !== "printOptionHeader") {
                // Livewire.emit("closeOpenedPanel");
            }
        }
    </script>
@endpush