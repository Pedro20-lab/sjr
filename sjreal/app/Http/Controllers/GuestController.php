<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guests = Guest::all();
        return view('guest.index')->with('guests', $guests);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guest.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(/*Request $request*/)
    {
        $values = \request()->only([
            'name_guest',
            'lastname_guest',
            'doc_guest',
            'num_doc_guest',
            'origin_guest',
            'phone_guest',
        ]);

        $guest = Guest::create($values);

        redirect()->route('guest.index');

    }

    /**
     * Show the form for searching a resource.
     */
    public function search() {
        $num_doc_guest = \request('num_doc_guest');        

        $guest = Guest::where('num_doc_guest', $num_doc_guest)->get();
        
        return redirect()->route('guest.show', ['id' => $guest]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {        
        $num_doc_guest = \request('num_doc_guest'); 
        $guest = Guest::where('num_doc_guest', $num_doc_guest)->get();
        // $guest = Guest::where('num_doc_guest', '777825283')->get();
        return view('guest.show')->with('guest', $guest);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $num_doc_guest)
    {
        $guest = Guest::where('id', $num_doc_guest)->first();
        return view('guest.edit')->with('guest', $guest);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        $guest = Guest::where('id', $id)->first();
        $values = \request()->only(['name_guest', 'lastname_guest', 'doc_guest', 'num_doc_guest', 'origin_guest', 'phone_guest']);
        $guest->update($values);        
        return redirect()->route('guest.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guest = Guest::find($id);
        $guest->delete();

        return redirect()->route('guest.index');

    }
}
