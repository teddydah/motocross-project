@if ($errors->any())
    <ul class="container alert alert-danger text-start">
        @foreach ($errors->all() as $error)
            <li class="ms-3">{{ $error }}</li>
        @endforeach
    </ul>
@endif
