<div class="prop-card">
    <div class="prop-card-img">
        <span class="prop-badge">Vente</span>
        @if($property->sold)
            <span class="prop-badge-sold">Vendu</span>
        @endif
        <i class="fa-solid fa-building"></i>
    </div>
    <div class="prop-card-body">
        <div class="prop-loc">
            <i class="fa-solid fa-location-dot"></i>
            {{ $property->city }} &middot; {{ $property->postal_code }}
        </div>
        <h5 class="prop-title">
            <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}">
                {{ $property->title }}
            </a>
        </h5>
        <div class="prop-specs">
            <span><i class="fa-solid fa-ruler-combined"></i>{{ $property->surface }} m²</span>
            <span><i class="fa-solid fa-door-open"></i>{{ $property->rooms }} pièces</span>
            @if($property->bedrooms > 0)
                <span><i class="fa-solid fa-bed"></i>{{ $property->bedrooms }} ch.</span>
            @endif
        </div>
        <div class="prop-footer">
            <div class="prop-price">{{ number_format($property->price, 0, ',', ' ') }}&nbsp;€</div>
            <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}"
               class="prop-link">Voir <i class="fa-solid fa-arrow-right ms-1"></i></a>
        </div>
    </div>
</div>