<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Show Song</title>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <nav class="flex justify-between items-center py-4">
            <a href="{{ route('songs.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Home</a>
            <h1 class="text-2xl font-bold">Song Details</h1>
        </nav>

        <div class="bg-white p-6 rounded shadow-md mt-6">
            <h2 class="text-xl font-semibold mb-4">{{ $song->title }}</h2>
            <p class="mb-2"><strong>Artist:</strong> {{ $song->singer }}</p>
            <p class="mb-2"><strong>Created on:</strong> {{ $song->created_at }}</p>
            <p class="mb-2"><strong>Last updated:</strong> {{ $song->updated_at }}</p>

            <div class="flex space-x-4 mt-4">
                <a href="{{ route('songs.edit', $song->id) }}" class="bg-yellow-500 text-white py-2 px-4 rounded">Edit</a>
                <form action="{{ route('songs.destroy', $song->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded">Delete</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>