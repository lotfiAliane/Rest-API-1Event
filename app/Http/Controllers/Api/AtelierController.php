<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Atelier;

class AtelierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $ateliers = Atelier::all();
      return response()->json(['ateliers'=>$ateliers],200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $atelier=Atelier::create($request->all());
        return response()->json(['atelier'=> $atelier],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $atelier= Atelier::find($id);
        if($atelier)
        {
          return response()->json(['atelier'=>$atelier],200);
        }
        else
        return response()->json(['error'=> 'not Found'],404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $atelier=Atelier::find($id);
        if($atelier)
        {
          $atelier->update($request->all());
          return response()->json(['atelier'=>$atelier,'status'=> 200],200);
        }
        else
        return response()->json(['error'=>'not found'],404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $atelier=Atelier::find($id);
        if($atelier)
        {
          $atelier->delete();
          return response()->json(['atelier'=>$atelier],200);
        }
        else
        return response()->json(['error'=>'not found'],404);

    }
}
