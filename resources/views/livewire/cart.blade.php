<div class="cart">
    <div class="overflow-x-auto">
        <div class="min-w-screen flex items-center justify-center font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left"></th>
                                <th class="py-3 px-6 text-left">Price</th>
                                <th class="py-3 px-6 text-center">Quantity</th>
                                <th class="py-3 px-6 text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach($documents as $index => $document)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="mr-2 w-20">
                                            <img src="{{$document['image']}}">
                                        </div>
                                        <span class="font-medium">{{ $document['fileName']}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{ $document['totalAmount'] }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center">
                                        <span>1</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span>{{ $document['totalAmount'] }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button wire:click="$emit('goToCheckout')" type="button" class="mt-3 w-1/6 bg-purple-900 px-4 py-3 text-gray-200 font-semibold hover:bg-purple-900 transition duration-200 each-in-out focus:outline-none focus:ring focus:border-purple-900">ADD TO CART</button>
                </div>
            </div>
        </div>
    </div>
</div>