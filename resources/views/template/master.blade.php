<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>

    @include('template/meta')

    @include('template/seo')

    <title>Tiberias Boston Management - @yield('title')</title>

    @yield('css_before')

    @include('template/link')

    @yield('css_after')

    @yield('js_before')

    @include('template/script')

</head>
<body>
    @include('template/loader')

    @yield('content')

    @yield('js_after')

    @include('template/footer')

    <script 
        src="{{ asset('/js/main.app.js') }}?v=1"
        type="module">
    </script>
</body>
</html>