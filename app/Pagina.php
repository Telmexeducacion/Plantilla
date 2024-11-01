<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    //
    protected $table = 'paginas'; // Especificamos la tabla si no sigue las convenciones
    protected $fillable = [
        'id_autor',
        'titulo',
        'contenido',
        'extracto',
        'tipo',
        'slug',
        'estatus',
        'fecha_publicacion'
    ];


    public function autor()
    {
        return $this->belongsTo(User::class, 'id_autor');
    }

    // Método para comprobar si es una página o post
    public function esPagina()
    {
        return $this->tipo === 'pagina';
    }

    public function esPublicado()
    {
        return $this->estatus === 'publicado';
    }



}
