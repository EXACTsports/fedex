<div class="select-location">
    <div class="border-t-2 border-b-2 flex flex justify-between items-center px-2">
        <h1 class="text-4xl mt-3 mb-3">1. Select a location</h1>
        <a x-show="!showSelectLocation" href="#">Edit</a>
    </div>
    <div x-show="showSelectLocation" class="select-location-wrapper">
        <div class="divide-y divide-yellow-500"></div>
        <div class="pickup flex items-center">
            <div class="flex flex-col">
                <label class="inline-flex items-center w-32">
                    <span class="ml-2 text-gray-700">Pick up within</span>
                </label>
            </div>
            <select wire:model="distance" class="ml-4 mr-4 w-40 bg-grey-lighter text-grey-darker border border-grey-lighter h-10 px-4">
                <option value="5-Miles">5 Miles</option>
                <option value="10-Miles">10 Miles</option>
                <option value="25-Miles">25 Miles</option>
                <option value="50-Miles">50 Miles</option>
                <option value="100-Miles">100 Miles</option>
            </select>
            of 
            <input class="m-4 border border-grey-lighter h-10 w-60" type="text" name="address" wire:model="address" />
            <button wire:click="$emit('searchLocations', '{{ $distance }}', '{{ $address }}')" type="button" 
                class="bg-grey-lighter justify-end w-40 text-grey-darker border border-grey-lighter h-10 bg-purple-900 text-white">SEARCH
            </button>
        </div>
        <livewire:fedex::locations />
        <div class="continue-button mt-5 flex justify-end">
            <button type="button" class="bg-purple-900 text-white p-3 w-60" x-on:click="$wire.gotToContactInformation()">CONTINUE</button>
        </div>
    </div>
</div>