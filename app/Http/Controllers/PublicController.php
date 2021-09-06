<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home() {
        // las ultimas 3 notas
    
        return view('welcome');
    }
}
