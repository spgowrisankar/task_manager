@include('shared.head')
@include('shared.sidebar')
@include('shared.header')
<div class="pcoded-main-container">
    <div class="pcoded-content">
    @yield('content')
    </div>
</div>
@include('shared.footer')
