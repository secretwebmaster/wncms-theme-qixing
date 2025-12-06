<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', \wncms()->locale()->getCurrentLocale()) }}" dir="ltr">

    <head>
        {{-- Meta --}}
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,minimum-scale=1,maximum-scale=5">
        {!! $website->meta_verification !!}
        @if (!gss('enable_cache') && !$website->enabled_page_cache)
            <meta name="csrf-token" content="{{ csrf_token() }}">
        @endif

        <link rel="shortcut icon" type="images/x-icon" href="{{ $website->site_favicon ?: asset('wncms/images/logos/favicon.png') }}" />

        {{-- SEO --}}
        <title>{{ $page_title ?? $website->site_name }}</title>
        <meta name="description" content="{{ $website->site_seo_description }}">
        <meta name="keywords" content="{{ $website->site_seo_keywords }}">
        @stack('head_seo')

        {{-- JS --}}
        <script src="{{ asset('wncms/js/cookie.js') . wncms()->addVersion('js') }}"></script>
        <script src="{{ wncms()->theme()->asset($themeId, 'js/rem.min.js') }}"></script>
        @stack('head_js')
        {!! $website->head_code !!}

        {{-- CSS --}}
        <link rel="stylesheet" type="text/css" href="{{ wncms()->theme()->asset($themeId, 'css/home.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ wncms()->theme()->asset($themeId, 'css/swiper-bundle.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ wncms()->theme()->asset($themeId, 'css/style.css') }}" />
        @stack('head_css')

        <style>
            {!! gto('head_css') !!}
        </style>
    </head>

    <body itemtype="https://schema.org/WebPage" itemscope="itemscope" class="@stack('body_class')">

        {!! $website->body_code !!}

        <div id="app">
            @include("$themeId::parts.header")

            @yield('content')

            @include("$themeId::parts.footer")
        </div>

        <script src="{{ asset('wncms/js/lazysizes.min.js' . wncms()->addVersion('js')) }}"></script>

        <script src="{{ wncms()->theme()->asset($themeId, 'js/jquery.min.js') }}"></script>
        <script src="{{ wncms()->theme()->asset($themeId, 'js/swiper-bundle.min.js') }}"></script>
        <script src="{{ wncms()->theme()->asset($themeId, 'js/app.js') }}"></script>

        @stack('foot_js')
        @stack('foot_css')

        {!! $website->analytics !!}
        <style>
            {!! gto('custom_css') !!}
        </style>

        <script>
            var base = '';
        </script>

        <script>
            $(document).ready(function() {
                // load previous page from session or referrer
                let previousPage = sessionStorage.getItem('previousPage') || document.referrer;
                console.log('previousPage: ' + previousPage);

                // read channel param
                let urlParams = new URLSearchParams(window.location.search);
                let channel = urlParams.get('channel') || sessionStorage.getItem('channel') || '';
                if (channel) {
                    sessionStorage.setItem('channel', channel);
                }

                // click listener
                $('[wncms-link-click]').on('click', function(e) {
                    // read polymorphic ID
                    let clickableId = $(this).data('click-id');
                    // read polymorphic type
                    let clickableType = $(this).data('click-type');
                    // optional tracking name
                    let name = $(this).data('click-name') || null;
                    // optional tracking value
                    let value = $(this).data('click-value') || null;

                    // check required values
                    if (!clickableId || !clickableType) {
                        console.log("data-click-id or data-click-type is missing");
                        return;
                    }

                    // refresh URL params and referer
                    let urlParams = new URLSearchParams(window.location.search);
                    let channel = urlParams.get('channel') || sessionStorage.getItem('channel') || '';
                    let referer = document.referrer || '';

                    // collect all URL parameters
                    let parameters = {};
                    urlParams.forEach((value, key) => {
                        parameters[key] = value;
                    });

                    // send AJAX to new route
                    $.ajax({
                        url: "{{ route('frontend.clicks.record') }}",
                        method: "POST",
                        data: {
                            clickable_id: clickableId,
                            clickable_type: clickableType,
                            name: name,
                            value: value,
                            channel: channel,
                            referer: referer,
                            parameters: parameters,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            console.log("Click recorded:", response);
                        },
                        error: function(xhr, status, error) {
                            console.error("Error:", error);
                        }
                    });
                });
            });
        </script>

    </body>

</html>
