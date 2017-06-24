@include('required.header')
    @include('layout.topnav')
    <div class="content-with-nav">
        @include('layout.leftnav')
        <div class="homepage">
            <div class="leftside">
                <div class="moreitems">
                    <h1>Recently Added</h1>
                    <div class="holder">
                        @foreach($recentData as $item)
                            @include('templates.nav-item')
                        @endforeach
                    </div>

                    <h1>Check Out</h1>
                    <div class="holder">
                        @foreach($randomData as $item)
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