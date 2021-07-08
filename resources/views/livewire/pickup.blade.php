<div class="pickup">
    <h1 class="text-4xl mb-11">1. Select a location</h1>
    <div class="pickup flex items-center">
         <div class="flex flex-col">
            <label class="inline-flex items-center w-32">Pick up within</label>
        </div>
        <select wire:model="radius" class="ml-1 mr-4 w-40 bg-grey-lighter text-grey-darker border border-grey-lighter h-10 px-4">
            <option value="5-Miles">5 Miles</option>
            <option value="10-Miles">10 Miles</option>
            <option value="25-Miles">25 Miles</option>
            <option value="50-Miles">50 Miles</option>
            <option value="100-Miles">100 Miles</option>
        </select>
        of 
        <input wire:model="postalCode" placeholder="Postal code" class="m-4 border border-grey-lighter h-10 px-4 w-60" type="text" name="postalCode" />
        <div class="button-continue">
            <button type="button" wire:click="searchLocations"
                class="bg-grey-lighter justify-end w-40 text-grey-darker border border-grey-lighter h-10 bg-purple-700 text-white">SEARCH
            </button>
        </div>
    </div>
    <hr class="block w-full mb-4 border-0 border-t border-gray-300" />
    @livewire('fedex::locations')
</div>