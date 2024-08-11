<!DOCTYPE html>
<html lang="az">
@include('front.layouts.includes.head')

<body class="light">
    <div class="loader-con">
        <div class="loader main-color center">
        </div>
    </div>
    <x-client-header-component />
    @yield('content')
    <x-client-footer-component />
    @include('front.layouts.includes.foot')

</body>

</html>
