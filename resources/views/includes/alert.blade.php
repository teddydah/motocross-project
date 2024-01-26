@if (session('success'))
    <div
        class="alert alert-success alert-block container d-flex justify-content-between align-items-baseline text-start">
        <span>{{ session('success') }}</span>
        <i class="close fa-solid fa-xmark" data-dismiss="alert" title="Fermer la fenêtre"></i>
    </div>
@elseif (session('errors'))
    <div
        class="alert alert-danger alert-block container d-flex justify-content-between align-items-center text-start">
        <div class="d-flex flex-column">
            @foreach($errors->all() as $error)
                <span>{{ $error }}</span>
            @endforeach
        </div>
        <i class="close fa-solid fa-xmark" data-dismiss="alert" title="Fermer la fenêtre"></i>
    </div>
@elseif (session('warning'))
    <div
        class="alert alert-warning alert-block container d-flex justify-content-between align-items-baseline text-start">
        <span>{{ session('warning') }}</span>
        <i class="close fa-solid fa-xmark" data-dismiss="alert" title="Fermer la fenêtre"></i>
    </div>
@endif
