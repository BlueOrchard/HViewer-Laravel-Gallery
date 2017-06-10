<div class="main-container">
   <div class="leftside">
       <div class="img-holder">
           <img src="http://placehold.it/381x600">
       </div>
       <a class="readnow" href="readnow">
           Read Now 
           <span class="mdi mdi-arrow-right"></span>
        </a>
        <div class="mini-data">
            <span>Pages</span>
            <span>182</span>
        </div>
        <div class="mini-data">
            <span>Date Added</span>
            <span>June 10, 2017</span>
        </div>
    </div>
    <div class="rightside">
        <h1>{{ $generalData->name }}</h1>
        <div class="split-two">
            <div class="fifty-container larger">
                <h3>Description</h3>
                <p>{{ $generalData->description }}</p>

                <h3>Related</h3>
                <div class="related">
                    <div>
                        <img class="related-img" src="http://placehold.it/381x600">
                    </div>
                    <div>
                        <img class="related-img" src="http://placehold.it/381x600">
                    </div>
                    <div>
                        <img class="related-img" src="http://placehold.it/381x600">
                    </div>
                    <div>
                        <img class="related-img" src="http://placehold.it/381x600">
                    </div>
                    <div>
                        <img class="related-img" src="http://placehold.it/381x600">
                    </div>
                </div>
            </div>
            <div class="fifty-container smaller">
                <h3>Categories</h3>
                <ul>
                    @foreach($generalData->tags as $tag)
                        <li>{{ $tag }}</li>
                    @endforeach
                </ul>

                <h3>Artists</h3>
                <ul>
                    <li>Murata, Yusuke</li>
                    <li>ONE</li>
                </ul>

                <h3>Languages</h3>
                <ul>
                    <li>English</li>
                </ul>
            </div>
        </div>
    </div> 
</div>