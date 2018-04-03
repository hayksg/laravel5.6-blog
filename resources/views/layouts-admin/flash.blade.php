@if($flash = session('message'))
    <div id="flash-message-admin" class="alert alert-success" role="alert">
        {{ $flash }}
    </div>
@endif
