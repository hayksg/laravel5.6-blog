@if($flash = session('message'))
    <div id="flash-message-admin" class="alert alert-success" role="alert">
        {{ $flash }}
    </div>
@endif

@if($flash = session('message_error'))
    <div id="flash-message-admin" class="alert alert-danger" role="alert">
        {{ $flash }}
    </div>
@endif
