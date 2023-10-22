@if($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <div class="list-group">

            @foreach($errors->all() as $error)
                <div class="list-group-item">
                    {{$error}}
                </div>
            @endforeach

        </div>
    </div>

@endif

@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible" id="success-alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>{{ session()->get('success') }}</strong>
    </div>

@elseif(session()->has('error'))
    <div class="alert alert-danger">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        {{session()->get('error')}}
    </div>
@endif


