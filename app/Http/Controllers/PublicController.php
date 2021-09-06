<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home() {
        // las ultimas 3 notas
        $notes = Note::orderBy('created_at','desc')->take(3)->get();

        return view('welcome',compact('notes'));
    }
}
