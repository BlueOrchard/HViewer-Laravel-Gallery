<div class="imageholder">
    <div class="mini-back">
        <h3>{{ $fullGallery->name }}</h3>
        <a href="/manga/{{ $fullGallery->slug }}"><span class="mdi mdi-arrow-left"></span> Go Back</a>
    </div>
    @foreach( $fullGallery->image_gallery_full as $image )
        <img src="{{ url($image) }}">
    @endforeach

    <div class="mini-back bottom">
        <h3>{{ $fullGallery->name }}</h3>
        <a href="/manga/{{ $fullGallery->slug }}"><span class="mdi mdi-arrow-left"></span> Go Back</a>
    </div>
</div>