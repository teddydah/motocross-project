@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block d-flex justify-content-between align-items-baseline">
        <strong>{{ $message }}</strong>
        <i class="close fa-solid fa-xmark" data-dismiss="alert" title="Fermer la fenêtre"></i>
    </div>
@elseif ($message = Session::get('error'))
    <div class="alert alert-danger alert-block d-flex justify-content-between align-items-baseline">
        <strong>{{ $message }}</strong>
        <i class="close fa-solid fa-xmark" data-dismiss="alert" title="Fermer la fenêtre"></i>
    </div>
@endif
