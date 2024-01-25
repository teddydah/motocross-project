@if(session('success'))
    <div class="container alert alert-success text-start">
        {{ session('success') }}
    </div>
@elseif(session('warning'))
    <div class="container alert alert-warning text-start">
        {{ session('warning') }}
    </div>
@elseif(session('danger'))
    <div class="container alert alert-danger text-start">
        {{ session('danger') }}
    </div>
@endif
