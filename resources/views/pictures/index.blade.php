<div class="container">
    <h2>Pictures</h2>
    <a href="{{ route('pictures.create') }}" class="btn btn-primary mb-3">Add Pictures</a>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <table class="table table-striped table-light text-center">
        <thead>
            <tr>
                <th scope="row">#</th>
                <th scope="row">Club</th>
                <th scope="row">Image</th>
                <th scope="row">Description</th>
                <th scope="row">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pictures as $picture)
            <tr>
                <td>{{ $picture->id }}</td>
                <td>{{ $picture->club->name }}</td>
                <td><img src="{{$picture->image}}" width="5%" /></td>
                <td>{{$picture->description}}</td>
                <td>
                    <form action="{{ route('pictures.destroy', $picture->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure?')">Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>