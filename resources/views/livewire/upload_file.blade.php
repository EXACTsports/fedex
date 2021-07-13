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
            @if(count($documents) > 0)
            <div class="my-2 overflow-x-auto sm:mx-6 lg:mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($documents as $index => $document)
                                    <tr>
                                        <td class="px-6 py-8 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-14 border">
                                                    <img class="h-20 w-16"
                                                    src="{{ $document['image'] }}"
                                                    alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-500">
                                                        <span class="px-2">{{ $document['documentName'] }}</span>
                                                        <div class="print-options text-xs">
                                                            <ul class="ml-4">
                                                                @foreach($document['selectedPrintOptions'] as $key => $value)
                                                                    <li>{{$key}}: {{$value}}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-8 w-52 text-right text-sm font-medium">
                                            <a href="#" class="border-2 border-indigo-900 p-3 rounded-full text-indigo-900 hover:text-indigo-900" 
                                                wire:click='$emit("setPrintOptions", "{{ $index }}")'>SET PRINT OPTIONS</a>
                                        </td>
                                        <td class="px-6 py-8 w-5 text-right text-sm font-medium">
                                            <a href="#" class="border-2 border-red-600 p-3 rounded-full text-red-600 hover:text-red-600" 
                                                wire:click='$emit("deleteDocument", "{{ $index }}")'>DELETE</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="continue-button mt-5 flex justify-end">
                        <button type="button" class="bg-purple-900 text-white p-3 w-60">CONTINUE</button>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>