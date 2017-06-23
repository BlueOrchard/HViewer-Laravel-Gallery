<div class="header">
    <div class="logo">
        <a href="/"><img src="{{ url('logo.png') }}"></a>
    </div>
    <div class="search">
        <form method="get" action="/search/">
            <input placeholder="Search" name="q"/>
            <button type="submit"><span class="mdi mdi-magnify"></span></button>
        </form>
    </div>
    <div class="simple-nav">
        <span class="mdi mdi-view-carousel"></span>
    </div>
    <div class="user-profile">
        <div class="crop-image">
            <img src="{{ url('placeholder.png') }}">
        </div>
    </div>
</div>