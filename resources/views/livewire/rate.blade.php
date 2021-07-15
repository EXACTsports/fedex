<div class="show-rate">
    @if ($showRatesInfo) 
        <div class="list">
            <ul class="list-reset flex flex-col">
                @foreach ($rateDetails['productLines'] as $product)
                    <li class="relative -mb-px block border p-6 border-grey">
                        <p>File Name: {{ $product["userProductName"] }}</p>
                        <p>Product Price:  {{ $product["productRetailPrice"] }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>