@props(['listing'])
<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block flex-auto" src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}" alt="" />
        <div>
            <h3 class="flex-auto text-2xl">
                <a href="/listings/{{ $listing->id }}"> {{ $listing->title }}</a>
            </h3>
            <div class="flex-auto text-xl font-bold mb-4">{{ $listing->company }}</div>
            <x-listing-tags :tagsCsv="$listing->tags" />
            <div class="text-lg mt-4 flex-auto">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
            </div>
        </div>
    </div>
</x-card>
