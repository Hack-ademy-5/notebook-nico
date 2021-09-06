<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!$user = Auth::user()){
            return redirect()->route('home');
        }
        // recuperar todas las notas
        $notes = $user->notes;
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
        if(!$user = Auth::user()){
            return redirect()->route('home');
        }
        
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
        if(!$user = Auth::user()){
            return redirect()->route('home');
        }
        
        $validatedData = $request->validate([
            'text'=>'required|min:3|max:500'
        ]);

        // Note::create($validatedData);

        $user->notes()->create($validatedData);

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
        // si no estas autentificado
        if(!$user = Auth::user()){
            return redirect()->route('home');
        }
        // recuperar la nota con id $id
        $note = Note::findOrFail($id);

        // si el id del usuario autentificado no corresponde con el id del usuario asociado a esa nota
        // significa que no es el creador y pues no la puede ver
        if($user->id != $note->user_id){
            return redirect()->route('home');
        }

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
        if(!$user = Auth::user()){
            return redirect()->route('home');
        }
        // recuperar la nota con id $id
        $note = Note::findOrFail($id);

        if($user->id != $note->user_id){
            return redirect()->route('home');
        }

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
        if(!$user = Auth::user()){
            return redirect()->route('home');
        }

        $validatedData = $request->validate([
            'text'=>'required|min:3|max:500'
        ]);
        // recuperar la nota que quiero modificar
        $note = Note::findOrFail($id);

        if($user->id != $note->user_id){
            return redirect()->route('home');
        }

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
        if(!$user = Auth::user()){
            return redirect()->route('home');
        }
        // recuperar la nota con id $id
        $note = Note::findOrFail($id);

        if($user->id != $note->user_id){
            return redirect()->route('home');
        }

        // elminar la nota
        $note->delete();

        return redirect()->route('home');
    }
}
