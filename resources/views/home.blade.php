@include('required.header')
    @include('layout.topnav')
    <div class="content-with-nav">
        @include('layout.leftnav')
        <div class="homepage">
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
        @include('layout.footer')
    </div>
@include('required.footer')