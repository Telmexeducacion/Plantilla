<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pagina;

class SitioController extends Controller
{


    //sitio home
    public function welcome()
{
    return view('welcome');
}



    //visualizara las paginas que estan actualmente construidas paginas no Post
    public function index(){
        $paginas = Pagina::all();
        return view('admin.index',compact('paginas'));

    }





}
