@props(["header"=>null,"footer"=>true,'title'=>"this is a default value for title","js_slot"=>null,"css_slot"=>null , "headContent"=>null])

<!DOCTYPE html>
<html lang="en" data-theme="light">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="theme-color" content="#e95b11" />
    <!-- Title -->
    <title>{{ $title }}</title>
    <!-- Favicon -->
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset("style.css") }}" />

    <!-- Web App Manifest -->
    @if ($css_slot)
        {!! $css_slot !!}
    @endif
  </head>

  <body>
    <x-toaster/>
    <x-preloader/>

    @if ($header)
        <x-includes.back-nav-header :title="$header" />
    @else
        <x-includes.header/>
    @endif

    @if ($headContent)
        {!! $headContent !!}
    @endif

    <div class="page-content-wrapper py-3">
        {{-- add tages here --}}
        {{  $slot }}
    </div>
    

    @if ($footer)
    <x-includes.footer/>
    @endif


    <!-- All JavaScript Files -->
    <script src="{{asset("js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("js/slideToggle.min.js") }}"></script>
    <script src="{{ asset("js/internet-status.js") }}"></script>
    <script src="{{ asset("js/tiny-slider.js") }}"></script>
    <script src="{{ asset("js/venobox.min.js") }}"></script>
    <script src="{{ asset("js/countdown.js") }}"></script>
    <script src="{{ asset("js/rangeslider.min.js") }}"></script>
    <script src="{{ asset("js/vanilla-dataTables.min.js") }}"></script>
    <script src="{{ asset("js/index.js") }}"></script>
    <script src="{{ asset("js/imagesloaded.pkgd.min.js") }}"></script>
    <script src="{{ asset("js/isotope.pkgd.min.js") }}"></script>
    <script src="{{ asset("js/dark-rtl.js") }}"></script>
    <script src="{{ asset("js/active.js") }}"></script>
    <script src="{{ asset("js/pwa.js") }}"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>


    @if ($js_slot)
        {!! $js_slot !!}
    @endif

  </body>

</html>
