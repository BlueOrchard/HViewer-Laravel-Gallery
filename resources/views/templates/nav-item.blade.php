<div class="item-component">
    <a href="/manga/{{ $item->slug }}">
        <img src="{{ url($item->cover_photo_thumb) }}">
        <p>{{ $item->name }}</p>
    </a>
</div>