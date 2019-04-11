@include($masterPath.'.layouts.header')
@include($masterPath.'.layouts.footer')
@include($masterPath.'.layouts.aside')
@include($masterPath.'.layouts.topnav')

@yield('header')

{{--@yield('aside')--}}
@yield('top')
@yield('content')

@yield('footer')

