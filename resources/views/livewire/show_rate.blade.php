<div class="show-rate w-2/6">
    @if ($showRatesInfo) 
        <div class="list">
            <ul class="list-reset flex flex-col">
                @foreach ($rate['productLines'] as $product)
                    <li class="relative -mb-px block border p-6 border-grey">
                        <p>File Name: {{ $product["userProductName"] }}</p>
                        <p>Product Price:  {{ $product["productRetailPrice"] }}</p>
                    </li>
                @endforeach
            </ul>
        </div>

        <p>Gross Amount: {{$rate['grossAmount']}} </p>
        <p>Tax Amount {{$rate['taxAmount']}} </p>
        <p>Total Amount {{$rate['totalAmount']}} </p>
    @endif
</div>