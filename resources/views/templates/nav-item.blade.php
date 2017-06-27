<div class="item-component" 
    data-slug="{{ $item->slug ? $item->slug : $item->series_slug }}"
    data-img="{{ $item->cover_photo }}"
    data-date="{{ $item->updated_at }}"
    data-title="{{ $item->name ? $item->name : $item->series }}"
    data-series="{{ $item->series }}"
    >
    <a href="{{ $item->slug ? '/manga/'.$item->slug : '/series/'.$item->series_slug }}">
        <img src="{{ url($item->cover_photo_thumb) }}">
        <p>{{ $item->name ? $item->name : $item->series }}</p>
    </a>

    <a href="{{ $item->slug ? '/manga/'.$item->slug : '/series/'.$item->series_slug }}">
        <div class="hovered">
            <span class="mdi mdi-arrow-right"></span>
        </div>
    </a>
</div>