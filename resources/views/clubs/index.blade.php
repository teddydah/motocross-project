<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clubs List</title>
</head>
<body>
    <h1>Clubs List</h1>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clubs as $club)
                <tr>
                    <td>{{ $club->name }}</td>
                    <td>{{ $club->address }}</td>
                    <td>{{ $club->city }}</td>
                    <td>
                        <a href="{{ route('clubs.edit', $club->id) }}">Edit</a>
                        <form action="{{ route('clubs.destroy', $club->id) }}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No clubs available</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <br>

    <a href="{{ route('clubs.create') }}">Add New Club</a>
</body>
</html>
