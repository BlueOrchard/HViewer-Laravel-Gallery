@include('required.header')
    @include('layout.topnav')
    <div class="content-with-nav">
        @include('layout.leftnav')
        <div class="browse">
            <div class="leftside">
                <div class="browseinfo">
                    <h1>Filter</h1>

                    <form class="sort-form" method="get">
                        <h4>Tags</h4>
                        <div class="tags">
                            @foreach($allTags as $tag)
                                <label>
                                    <input type="checkbox" name="tags" value="{{ $tag->tag_slug }}">
                                        {{ $tag->tag_name }}
                                    </input>
                                </label>
                            @endforeach
                        </div>

                        <button type="submit">Submit</button>
                    </form>
                </div>
                <div class="moreitems">
                    <h1>Browse</h1>
                    <div class="filtered-items">
                        @foreach($filteredPosts as $item)
                            @include('templates.nav-item')
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="rightside">
                <div class="readme">
                    <span class="mdi mdi-book-open-variant"></span>
                </div>
                <p class="tooltip">Hover over an item to get more information on it.</p>
            </div>
            <div class="rightsideloader"></div>
        </div>
        @include('layout.footer')
    </div>
@include('required.footer')