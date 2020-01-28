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
        return view('catalog.edit', array('pelicula'=>$movie));
    }

    public function postCreate(Request $request){
        $p = new Movie;
        $p->title = $request->input('title');
        $p->year = $request->input('year');
        $p->director = $request->input('director');
        $p->poster = $request->input('poster');
        $p->rented = false;
        $p->synopsis = $request->input('synopsis');
        $p->save();
        return redirect()->action('CatalogController@getIndex');

    }

    public function putEdit(Request $request, $id){
        $p = Movie::findOrFail($id);
        $p->title = $request->input('title');
        $p->year = $request->input('year');
        $p->director = $request->input('director');
        $p->poster = $request->input('poster');
        $p->synopsis = $request->input('synopsis');
        $p->save();
        return view('catalog.show', ['pelicula'=>$p]);
    }
}
