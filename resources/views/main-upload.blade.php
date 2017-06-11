@include('required.header')
    @include('layout.topnav')
    <div class="content-with-nav">
        @include('layout.leftnav')
        @include('templates.upload-gallery')
        @include('layout.footer')
    </div>
@include('required.footer')