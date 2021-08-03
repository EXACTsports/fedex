<div class="show-rate p-5">
    <div class="checkout-documents">
        <ul class="list-reset flex flex-col">
            <template x-for="(document, index) in documents" :key="index">
                <li class="border-1">
                    <div class="flex flex-col">
                        <div class="document-wrapper">
                            <div class="document-description flex">
                                <div class="document-image border w-24">
                                    <img :src="document.image" :alt="document.documentName">
                                </div>
                                <div class="document-name p-5">
                                    <p x-text="document.name"></p>
                                    <p x-text="document.documentName"></p>
                                    <p x-text="document.rate.totalAmount"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </template>
        </ul>
    </div>
</div>