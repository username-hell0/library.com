@if(session('success'))
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    x
                </button>
                {{ session()->get('success') }}
            </div>
        </div>
    </div>
@endif
