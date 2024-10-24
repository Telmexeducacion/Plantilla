<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitioController extends Controller
{


    //visualizara las paginas que estan actualmente construidas paginas no Post
    public function adminIndex(){
        return view('admin.index');
    }





}
