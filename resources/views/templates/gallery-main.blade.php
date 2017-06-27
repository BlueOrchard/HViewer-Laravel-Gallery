<div class="main-container">
   <div class="leftside">
       <div class="img-holder">
           <img src="{{ url($generalData->cover_photo_thumb) }}">
       </div>
       <a class="readnow" href="{{ $generalData->slug }}/read">
           Read Now 
           <span class="mdi mdi-arrow-right"></span>
        </a>
        <div class="mini-data">
            <span>Series</span>
            <span>{{ $generalData->series }}</span>
        </div>
        <div class="mini-data">
            <span>Date Added</span>
            <span>June 10, 2017</span>
        </div>
        <div class="mini-data">
            <span>Pages</span>
            <span>30</span>
        </div> 
    </div>
    <div class="rightside">
        <h1>{{ $generalData->name }}</h1>
        <div class="split-two">
            <div class="fifty-container larger">
                <h3>Description</h3>
                <p>{{ $generalData->description }}</p>

                <h3>Preview</h3>
                <div class="preview">
                    @foreach($generalData->image_gallery_thumbs as $imagethumb)
                    <div>
                        <img src="{{ url($imagethumb) }}">
                    </div>
                    @endforeach
                </div>

                <h3>Related</h3>
                <div class="related">
                    @foreach($relatedArray as $related)
                        <div>
                            <img src="{{ url($related->cover_photo_thumb) }}">
                            <span>{{ $related->name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="fifty-container smaller">
                <h3>Series</h3>
                <ul>
                    <li><a href="/series/{{ $generalData->series_slug }}">{{ $generalData->series }}</a></li>
                </ul>

                <h3>Categories</h3>
                <ul>
                    @foreach($seriesData->tags as $tag)
                        <li>{{ $tag }}</li>
                    @endforeach
                </ul>

                <h3>Artists</h3>
                <ul>
                    @foreach($seriesData->artists as $artist)
                        <li>{{ $artist }}</li>
                    @endforeach
                </ul>

                <h3>Languages</h3>
                <ul>
                    @foreach($seriesData->languages as $language)
                        <li>{{ $language }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div> 
</div>