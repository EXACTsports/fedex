<div class="upload-file-wrapper flex">
    <div class="w-1/6">
        <label
            class="my-4 flex flex-col items-center px-4 py-6 bg-white rounded-md shadow-md tracking-wide 
                uppercase border border-blue cursor-pointer hover:bg-purple-900 hover:text-white text-purple-900 
                ease-linear transition-all duration-150">
            <i class="fas fa-cloud-upload-alt fa-3x"></i>
            <span class="mt-2 text-base leading-normal">UPLOAD FILE</span>
            <input type='file' class="hidden" wire:model="file" wire:change="$emit('showLoader', true)"  />
        </label>
    </div>
    <div class="table-documents w-5/6">
        <div class="flex flex-col text-left">
            <template x-if="documents.length > 0">
                <div class="my-2 overflow-x-auto sm:mx-6 lg:mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <template x-for="(document, index) in documents" :key="index">
                                        <tr>
                                            <td class="px-6 py-8 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-14 border">
                                                        <img class="h-20 w-16"
                                                        :src="document.image"
                                                        alt="">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-500">
                                                            <span class="px-2" x-text="document.documentName"></span>
                                                            <div class="print-options text-xs">
                                                                <ul class="ml-4">
                                                                    <template x-for="[key, value] of Object.entries(document.selectedPrintOptions)">
                                                                        <div class="options">
                                                                            <template x-for="[k, v] of Object.entries(value)">
                                                                                <li>
                                                                                    <span x-text="k"></span>: <span x-text="v"></span>
                                                                                </li>
                                                                            </template>
                                                                        </div>
                                                                    </template>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-8 w-32 text-center text-sm font-medium">
                                                <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                                                    <input type="number" x-bind:value="document.quantity" class="outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="custom-input-number" value="0" />
                                                </div>
                                            </td>
                                            <td class="px-6 py-8 w-32 text-right text-sm font-medium">
                                                <span x-text="document.rate.totalAmount"></span>
                                            </td>
                                            <td class="px-6 py-8 w-52 text-right text-sm font-medium">
                                                <a href="#" class="border-2 border-indigo-900 p-3 rounded-full text-indigo-900 hover:text-indigo-900" 
                                                    x-on:click='$wire.setPrintOptions(index)'>SET PRINT OPTIONS</a>
                                            </td>
                                            <td class="px-6 py-8 w-5 text-right text-sm font-medium">
                                                <a href="#" class="border-2 border-red-600 p-3 rounded-full text-red-600 hover:text-red-600" 
                                                    x-on:click='$wire.deleteDocument(index)'>DELETE</a>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                        <div class="continue-button mt-5 flex justify-end">
                            <button type="button" class="bg-purple-900 text-white p-3 w-60" x-on:click="$wire.goToCheckout()">CONTINUE</button>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>