<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Participant;

class ParticipantController extends Controller
{


  public $successStatus = 200;
    /**
     * Display a listing of the response.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participant=Participant::all();
        return response()->json(['participants'=>$participant],$successStatus);
    }

    /**
     * Show the form for creating a new response.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created response in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $participant=Participant::create($request->all());
        return response()->json(['participant'=>$participant],200);
    }

    /**
     * Display the specified response.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $participant=Participant::find($id);

        if($participant)
        {
            return response()->json(['participant'=>$participant],200);
        }
        else
        return response()->json(['error'=>'not found'],404);
    }

    /**
     * Show the form for editing the specified response.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified response in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $participant=Participant::find($id);
        if($participant)
        {
          $participant->update($request->all());
          return response()->json(['participant'=>$participant],$successStatus);
        }
        return response()->json(['error'=>'participant dont existe'],401);
    }

    /**
     * Remove the specified response from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participant=Participant::find($id);
        if($participant)
        {
            $participant->delete();
            return response()->json(['participant'=>$participant],$successStatus);
        }
        else

        return response()->json(['participant'=>$participant],$successStatus);
    }
    public function subscription(Request $request,$id)
    {
      $participant=Participant::find($id);
      //$atelier=\App\Atelier::find($request->id);
    //  $participant->ateliers()->attach($atelier);
  /* if ( ! $participant->ateliers()->sync($request->ids)) {
    return response()->json(['participant'=>$participant],404);
}*/
foreach ($request->ids as $idy) {
  $atelier=\App\Atelier::find($idy);
  if( $participant->ateliers->contains($atelier)   )
    {
    }
    else {
      $participant->ateliers()->syncWithoutDetaching($atelier);
          if($atelier->places>0)
          {
            $atelier->places=$atelier->places-1;
          }
          else
          {
            if($atelier->reserve >0 )
            {
              $atelier->reserve=$atelier->reserve-1;
            }
          }
          $atelier->update();
    }

}
//$participant=Participant::find($id)->with('ateliers')->get();
$participant=Participant::find($id);
      return response()->json(['participant'=>$participant->ateliers],200);

    }
}
