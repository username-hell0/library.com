@if(session('success'))
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
                If you did not receive the email,
                <a href="{{ route('resend.mail') }}">click here to request another</a>.
            </div>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}
                If you did not receive the email,
                <a href="{{ route('resend.mail') }}">click here to request another</a>.
            </div>
        </div>
    </div>
@endif
