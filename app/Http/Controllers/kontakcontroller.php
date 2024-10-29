<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class kontakcontroller extends Controller
{

    public function show(){
        return view('kontak', [
            "title" => "Contact"
        ]);
        
    }

    
}
