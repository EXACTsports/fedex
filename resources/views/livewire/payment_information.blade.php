<div class="payment-information-wrapper mt-3">
    <div class="border-t-2 border-b-2">
        <h1 class="text-4xl mt-3 mb-3">3. Payment information</h1>
    </div>
    <div x-show="showPaymentInformation" class="payment-information">
        <div class="form">
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Name on Card</label>
                <input type="text" name="nameOnCard" class="px-3 py-2 placeholder-gray-300 border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
            </div>
            <div class="mb-12 flex">
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Card Number</label>
                    <input type="text" name="cardNumber" class="px-3 py-2 placeholder-gray-300 border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                </div>
                <div class="mb-3">
                    <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Security Code</label>
                    <input type="text" name="cardNumber" class="px-3 py-2 placeholder-gray-300 border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                </div>
            </div>
            <div class="mb-12 flex">
                <div class="mb-3">
                    <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Month</label>
                    <input type="text" name="cardNumber" class="px-3 py-2 placeholder-gray-300 border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                </div>
                <div class="mb-3">
                    <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Year</label>
                    <input type="text" name="cardNumber" class="px-3 py-2 placeholder-gray-300 border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                </div>
            </div>
        </div>
        <div class="button-continue">
            <button type="button" 
                wire:click="$emit('placeOrder')" class="mt-5 bg-grey-lighter justify-end w-40 text-grey-darker border border-grey-lighter h-10 bg-purple-700 text-white">PLACE ORDER
            </button>
        </div>
    </div>
</div>