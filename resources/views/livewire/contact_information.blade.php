<div class="contact-information-wrapper mt-3">
    <div class="border-t-2 border-b-2">
        <h1 class="text-4xl mt-3 mb-3">2. Enter contact information</h1>
        <a x-show="!showSelectLocation && showPaymentInformation" href="#">Edit</a>    
    </div>
    <div x-show="showContactInformation" class="contact-information">
        <div class="form">
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">First Name</label>
                <input type="text" name="firstName" class="px-3 py-2 placeholder-gray-300 border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Last Name</label>
                <input type="text" name="lastName" class="px-3 py-2 placeholder-gray-300 border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
            </div>
        </div>
    </d>
</div>