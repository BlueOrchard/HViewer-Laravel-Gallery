<div class="item-component" 
    data-slug="{{ $item->slug }}"
    data-img="{{ $item->cover_photo }}"
    data-date="{{ $item->created_at }}"
    data-title="{{ $item->name }}"
    data-series="{{ $item->series }}"
    >
    <a href="/manga/{{ $item->slug }}">
        <img src="{{ url($item->cover_photo_thumb) }}">
        <p>{{ $item->name }}</p>
    </a>

    <a href="/manga/{{ $item->slug }}">
        <div class="hovered">
            <span class="mdi mdi-arrow-right"></span>
        </div>
    </a>
</div>