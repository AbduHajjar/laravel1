<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::all();
        return view('songs.index', ['songs' => $songs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('songs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'singer' => 'nullable|string|max:255',
        ]);

        // Create a new song instance with the validated data
        $song = new Song();
        $song->title = $request->title;
        $song->singer = $request->singer;
        $song->save();

        // Redirect to the index page with a success message
        return redirect()->route('songs.index')->with('success', 'Song created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $song = Song::findOrFail($id);
        // find can be translated below:
        // Song::where('id', '=', $id)->first();

        //  fail can be translated below:
        // SELECT * FROM `songs` WHERE id = $id LIMIT 1;

        // Geeft dit niks terug, dan geef een 404 error

        return view('songs.show', ['song' => $song]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $song = Song::findOrFail($id);
        return view('songs.edit', ['song' => $song]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'singer' => 'required|string|max:255',
        ]);

        // Find the song by its ID and update it with the validated data
        $song = Song::findOrFail($id);
        $song->title = $request->title;
        $song->singer = $request->singer;
        $song->save();

        // Redirect to the index page with a success message
        return redirect()->route('songs.index')->with('success', 'Song updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the song by its ID and delete it
        $song = Song::findOrFail($id);
        $song->delete();

        // Redirect to the index page with a success message
        return redirect()->route('songs.index')->with('success', 'Song deleted successfully.');
    }
}
