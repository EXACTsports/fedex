<div class="contact-information-wrapper mt-3">
    <div class="border-t-2 border-b-2 flex justify-between items-center px-2">
        <h1 class="text-4xl mt-3 mb-3">2. Enter contact information</h1>
        <a x-show="!showSelectLocation && showPaymentInformation" href="#">Edit</a>    
    </div>
    <div x-show="showContactInformation" class="contact-information">
        <div class="form grid grid-cols-2 gap-4 mt-4">
            <div class="mb-6">
                <label for="firstName" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">First Name</label>
                <input type="text" name="firstName" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
            </div>
            <div class="mb-6">
                <label for="lastName" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Last Name</label>
                <input type="text" name="" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
            </div>
            <div class="mb-6">
                <label for="company" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Company</label>
                <input type="text" name="company" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
            </div>
            <div class="mb-6 col-span-2">
                <label for="phone" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Phone</label>
                <input type="text" name="phone" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
            </div>
            <div class="mb-6">
                <label for="phoneExt" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Phone Ext.</label>
                <input type="text" name="phoneExt" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
            </div>
            <div class="mb-6">
                <label for="alternatePhone" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Alternate Phone</label>
                <input type="text" name="alternatePhone" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
            </div>
            <div class="mb-6">
                <label for="altPhoneExt" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Alt. Phone Ext.</label>
                <input type="text" name="altPhoneExt" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Email</label>
                <input type="text" name="email" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
            </div>
        </div>
        <div class="continue-button mt-5 flex justify-end">
            <button type="button" class="bg-purple-900 text-white p-3 w-60" x-on:click="$wire.goToPaymentInformation()">CONTINUE</button>
        </div>
    </div>
</div>