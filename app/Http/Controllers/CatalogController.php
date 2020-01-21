<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class CatalogController extends Controller
{
    

    //
    public function getShow($id)
    {
		$movie = Movie::findOrFail($id);
        return view('catalog.show', ['pelicula'=>$movie]);
    }
    public function getIndex()
    {
		$movies = Movie::all();
        return view('catalog.index',['arrayPeliculas' => $movies]);
    }
    public function getCreate()
    {
        return view('catalog.create');
    }
    public function getEdit($id)
    {
		$movie = Movie::findOrFail($id);
        return view('catalog.edit', array('movie'=>$movie));
    }
}
