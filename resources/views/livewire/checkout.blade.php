<div class="checkout pt-4 flex">
    <div class="components w-5/6">
        <livewire:fedex::select-location />
        <livewire:fedex::contact-information :showContactInformation="$showContactInformation" />
        <livewire:fedex::payment-information :showPaymentInformation="$showPaymentInformation" />
    </div>
    <livewire:fedex::show-rate :showRatesInfo="$showRatesInfo"/>
</div>