<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FilmRequest;
use App\film;
use App\Category;
class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films= film::oldest('year')->with('Category')->with('Types')->paginate(5);
        dd($films);
        return view('film.index',compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('film.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilmRequest $filmrequest,film $film)
    {
        $film::create($filmrequest->all());
        return redirect()->route('films.index')->with('msg','added with success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(film $film)
    {
        return view('film.edit',compact('film'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FilmRequest $filmrequest,film $film)
    {
      $film->update($filmrequest->all());
      return redirect()->route('films.edit',$film->id)->with('msg','succée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        film::find($id)->delete();
        return redirect()->route('films.index');
    }
    public function forceDestroy($id)
{
    Film::withTrashed()->whereId($id)->firstOrFail()->forceDelete();
    return back()->with('info', 'Le film a bien été supprimé définitivement dans la base de données.');
}
public function restore($id)
{
    Film::withTrashed()->whereId($id)->firstOrFail()->restore();
    return back()->with('info', 'Le film a bien été restauré.');
}


}
