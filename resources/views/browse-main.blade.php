@include('required.header')
    @include('layout.topnav')
    <div class="content-with-nav">
        @include('layout.leftnav')
        <div class="browse">
            <div class="leftside">
                <div class="browseinfo">
                    <h1>Filter</h1>

                    <form method="get">
                        <h4>Tags</h4>
                        @foreach($allTags as $tag)
                            <input type="checkbox" name="tags" value="{{ $tag->tag_slug }}">
                                {{ $tag->tag_name }}
                            </input>
                        @endforeach

                        <button type="submit">Submit</button>
                    </form>
                </div>
                <div class="moreitems">
                    <h1>Browse</h1>
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