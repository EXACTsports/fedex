<div class="payment-information-wrapper mt-3">
    <div class="border-t-2 border-b-2">
        <h1 class="text-4xl mt-3 mb-3">3. Payment information</h1>
    </div>
    <div x-show="showPaymentInformation" class="payment-information">
        <div class="form grid grid-cols-4 gap-4 mt-4">
            <div class="mb-6 col-span-4">
                <label for="nameOnCard" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Name on Card</label>
                <input type="text" wire:model="nameOnCard" name="nameOnCard" class="w-1/2 px-3 py-2 placeholder-gray-300 border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
            </div>
            <div class="mb-6 col-span-4 flex">
                <div class="card-number w-2/4">
                    <label for="cardNumber" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Card Number</label>
                    <input type="text" wire:model="cardNumber" name="cardNumber" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                </div>
                <div class="security-code ml-2">
                    <label for="securityCode" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Security Code</label>
                    <input type="text" wire:model="securityCode" name="securityCode" class=" px-3 py-2 placeholder-gray-300 border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                </div>
            </div>
            <div class="mb-6 col-span-2">
                <label for="expiration-date" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Exp. Date</label>
                <div class="expiration-date flex">
                    <input type="text" wire:model="month" placeholder="Month" name="month" class="w-1/2 px-3 py-2 placeholder-gray-300 border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                    <input type="text" wire:model="year" placeholder="Year" name="year" class="w-1/2 px-3 py-2 placeholder-gray-300 border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                </div>
            </div>
        </div>
        <div class="continue-button mt-5 flex justify-end">
            <button type="button" class="bg-purple-900 text-white p-3 w-60" x-on:click="$wire.emit('setPaymentInformation')">SUBMIT ORDER</button>
        </div>
    </div>
</div>