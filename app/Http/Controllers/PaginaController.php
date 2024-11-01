<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pagina;

class PaginaController extends Controller
{
    //Formulario para crear Pagina Nueva
    public function create(){
        return view('admin.formPagina'); // Retorna la vista con el formulario
    }


    //Funcion para crear la pagina Nueva
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'titulo' => 'required|max:255',
            'contenido' => 'required',
            'extracto' => 'nullable|max:255',
            'tipo' => 'required|in:pagina,post',
            'slug' => 'required|unique:paginas,slug',
            'estatus' => 'required|in:publicado,revision,baja',
        ]);

        // Crear la nueva página o post
        Pagina::create([
            'id_autor' => auth()->id(), // Asigna el autor que está autenticado
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'extracto' => $request->extracto,
            'tipo' => $request->tipo,
            'slug' => $request->slug,
            'estatus' => $request->estatus,
            'fecha_publicacion' => $request->estatus === 'publicado' ? now() : null, // Fecha de publicación solo si está publicado
        ]);

        // Redirigir a la lista de páginas con un mensaje de éxito
        return redirect()->route('paginas')->with('success', 'Página creada correctamente');
    }

    public function destroy($id)
{
    $pagina = Pagina::findOrFail($id);
    $pagina->delete();

    return redirect()->route('paginas')->with('success', 'Página eliminada correctamente.');
}

public function show($slug)
{
    // Buscar la página por su slug
    $pagina = Pagina::where('slug', $slug)->firstOrFail();

    // Retornar la vista 'paginas.show' con los datos de la página
    return view('pagina', compact('pagina'));
}
public function index(){
    $paginas = Pagina::all();
    return view('admin.index',compact('paginas'));
}



}
