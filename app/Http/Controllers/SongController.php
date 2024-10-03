<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = ['Living on a prayer', 'Nothing else matters',
            'Thunderstruck', 'Back in black', 'Ace of spades'];
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $songs = ['Living on a prayer', 'Nothing else matters',
            'Thunderstruck', 'Back in black', 'Ace of spades'];

        if (!isset($songs[$id]))
        {
            return abort(404, "Song not found");
        }

        return view('songs.show', ['song' => $songs[$id]]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $songs = ['Living on a prayer', 'Nothing else matters', 'Thunderstruck', 'Back in black', 'Ace of spades'];
        if (!isset($songs[$id]))
        {
            return abort(404, "Song not found");
        }

        return view('songs.edit', ['song' => $songs[$id]]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
