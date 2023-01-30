@extends('layouts.user')

@section('css')
    {{-- scripts --}}
<script
src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/chatify/font.awesome.min.js') }}"></script>
<script src="{{ asset('js/chatify/autosize.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>

{{-- styles --}}
<link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css'/>
<link href="{{ asset('css/chatify/style.css') }}" rel="stylesheet" />
<link href="{{ asset('css/chatify/'.$dark_mode.'.mode.css') }}" rel="stylesheet" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
@endsection

@section('content')

{{-- ----------------------Messaging side---------------------- --}}
<div class="messenger-messagingView">
    {{-- Internet connection --}}
    <div class="internet-connection">
        <span class="ic-connected">Connected</span>
        <span class="ic-connecting">Connecting...</span>
        <span class="ic-noInternet">No internet access</span>
    </div>
    {{-- Messaging area --}}
    <div class="m-body messages-container app-scroll">
        <div class="messages">
            <p class="message-hint center-el"><span>Please select a chat to start messaging</span></p>
        </div>
        {{-- Typing indicator --}}
        <div class="typing-indicator">
            <div class="message-card typing">
                <p>
                    <span class="typing-dots">
                        <span class="dot dot-1"></span>
                        <span class="dot dot-2"></span>
                        <span class="dot dot-3"></span>
                    </span>
                </p>
            </div>
        </div>
        {{-- Send Message Form --}}
        @include('Chatify::layouts.sendForm')
    </div>
</div>

@endsection

@section('js')
<script src="https://js.pusher.com/7.0.3/pusher.min.js"></script>
<script >
  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher("{{ config('chatify.pusher.key') }}", {
    encrypted: true,
    cluster: "{{ config('chatify.pusher.options.cluster') }}",
    authEndpoint: '{{route("pusher.auth")}}',
    auth: {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }
  });

    // Bellow are all the methods/variables that using php to assign globally.
    const allowedImages = {!! json_encode(config('chatify.attachments.allowed_images')) !!} || [];
    const allowedFiles = {!! json_encode(config('chatify.attachments.allowed_files')) !!} || [];
    const getAllowedExtensions = [...allowedImages, ...allowedFiles];
    const getMaxUploadSize = {{ Chatify::getMaxUploadSize() }};
</script>
<script src="{{ asset('js/chatify/code.js') }}"></script>
@endsection