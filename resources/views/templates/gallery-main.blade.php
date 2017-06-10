<div class="main-container">
   <div class="leftside">
       <img src="http://placehold.it/381x600">
       <a class="readnow" href="readnow">
           Read Now 
           <span class="mdi mdi-arrow-right"></span>
        </a>
    </div>
    <div class="rightside">
        <h1>{{ $generalData->name }}</h1>
        <div class="split-two">
            <div>
                <h3>Description</h3>
                <p>{{ $generalData->description }}</p>

                <h3>Related</h3>
                <p>Related Galleries Here</p>
            </div>
            <div>
                <h3>Categories</h3>
                <ul>
                    <li>Action</li>
                    <li>Sci-Fi</li>
                    <li>Comedy</li>
                    <li>Parody</li>
                    <li>Super Power</li>
                    <li>Supernatural</li>
                    <li>Seinen</li>
                </ul>
            </div>
        </div>
    </div> 
</div>