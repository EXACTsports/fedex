<div class="checkout pt-4 flex">
    <div class="components w-5/6">
        <livewire:fedex::select-location />
        <livewire:fedex::contact-information :showContactInformation="$showContactInformation" />
        <livewire:fedex::payment-information :showPaymentInformation="$showPaymentInformation" />
    </div>
    <div class=" w-2/6">
        <livewire:fedex::rate />
    </div>
</div>