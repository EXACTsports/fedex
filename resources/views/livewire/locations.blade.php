<div class="locations">
    <div class="list">
        <ul class="list-reset flex flex-col">
            @foreach($locations as $index => $location)
                <li class="relative -mb-px block border p-6 border-grey">{{ $location["location"]["name"] }}</li>
            @endforeach
        </ul>
    </div>
</div>