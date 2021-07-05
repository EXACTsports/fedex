<div class="content-wrapper" x-cloak 
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
        <livewire:fedex::upload-file />
    </div>
    <!-- END UPLOAD FILE COMPONENT -->

    <!-- BEGIN SET PRINT OPTIONS COMPONENT -->
    <div x-show="showSetPrintOptionsComponent">
        <livewire:fedex::set-print-options />
    </div>
    <!-- END PRINT OPTIONS COMPONENT -->

    <!-- BEGIN CART -->
    <div x-show="showCart">
        <livewire:fedex::cart />
    </div>
    <!-- END CART --> 

    <!-- BEGING DELIVERY OPTIONS -->
    <div x-show="showDeliveryOptions">
        <livewire:fedex::delivery-options />
    </div>
    <!-- END DELIVERY OPTIONS -->

    <!-- BEGING CHECKOUT -->
    <div x-show="showCheckout">
        <livewire:fedex::checkout />
    </div>
    <!-- END CHEKOUT -->
</div>