<div class="locations">
    <div class="list">
        <ul class="list-reset flex flex-col">
            <template x-for="(location, index) in locations" :key="index">
                <li class="relative -mb-px block border p-6 border-grey" x-text="location.location.name"></li>
            </template>
        </ul>
    </div>
</div>