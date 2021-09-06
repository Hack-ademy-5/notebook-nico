<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // recuperar todas las notas
        $notes = Note::all();
        // pasarlas  a la vista y devolver la vista
        return view('notes',compact('notes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'text'=>'required|min:3|max:500'
        ]);

        Note::create($validatedData);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // recuperar la nota con id $id
        $note = Note::findOrFail($id);

        return view('note-detail',compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // recuperar la nota con id $id
        $note = Note::findOrFail($id);

        return view('notes-edit',compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'text'=>'required|min:3|max:500'
        ]);
        // recuperar la nota que quiero modificar
        $note = Note::findOrFail($id);
        // actualizar el db con los nuevos datos
        $note->update($validatedData);
        
        // salir con un redirect
        return redirect()->route('notes.show',['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // recuperar la nota con id $id
        $note = Note::findOrFail($id);

        // elminar la nota
        $note->delete();

        return redirect()->route('home');
    }
}
