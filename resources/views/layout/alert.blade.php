@if (session()->has('success'))
    <div class="row">
        <div class="col">
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        </div>
    </div>
@endif
@if (session()->has('error'))
    <div class="row">
        <div class="col">
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
        </div>
    </div>
@endif
