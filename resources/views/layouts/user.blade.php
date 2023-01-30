<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ URL::asset('img/icon.svg') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.2/cropper.css" integrity="sha512-5ZQRy5L3cl4XTtZvjaJRucHRPKaKebtkvCWR/gbYdKH67km1e18C1huhdAc0wSnyMwZLiO7nEa534naJrH6R/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script id= "midtrans-script" src="https://api.midtrans.com/v2/assets/js/midtrans-new-3ds.min.js" data-environment="production" data-client-key="Mid-client-tjICMZmEzWC800D6" type="text/javascript"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">

    @yield('css')

    <title>{{ config('app.name') }}</title>
</head>
<body class="bg-gray-50">
    
    @if (request()->route()->getPrefix('user'))
    <div class="flex">
        <div class="w-1/4">
            @include('partials.sidemenu')
        </div>
        <div class="w-3/4">
            <div class="px-8">
                @yield('content')
            </div>
        </div>
    </div>
    @else
    @include('partials.topnav')
    <div class="px-36">
        @yield('content')
    </div>
    @endif

    @yield('js')
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.2/cropper.js" integrity="sha512-witv14AEvG3RlvqCAtVxAqply8BjTpbWaWheEZqOohL5pxLq3AtIwrihgz7SsxihwAZkhUixj171yQCZsUG8kw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>