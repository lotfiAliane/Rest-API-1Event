<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Participant;

use function GuzzleHttp\json_encode;

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
        return response()->json(['participants'=>$participant],$this->successStatus);
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

    public function participantByNum($num)
    {
      $participant= Participant::where('phone',$num)->with('ateliers')->first();
      if($participant)
      {
          return response()->json(['participant'=> $participant],200);
      }
      else
      {
        return response()->json(['error'=>'participant does not exist'],401);
      }
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
          return response()->json(['participant'=>$participant],$this->successStatus);
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
            return response()->json(['participant'=>$participant],$this->successStatus);
        }
        else

        return response()->json(['participant'=>$participant],$this->successStatus);
    }
    public function subscription(Request $request,$id)
    {
      $participant=Participant::find($id);
      //$atelier=\App\Atelier::find($request->id);
    //  $participant->ateliers()->attach($atelier);
  /* if ( ! $participant->ateliers()->sync($request->ids)) {
    return response()->json(['participant'=>$participant],404);
}*/
$ateliers=$request->all();
if(count($participant->ateliers))
{
  foreach($participant->ateliers as $atelier)
  {
    if($atelier->places > 0 ){
      $atelier->places =$atelier->places +1;

    }
    else

    {
      $atelier->reserve= $atelier->reserve +1;
    }
    $atelier->update();
  }
 $participant->ateliers()->detach();
}
$participant=Participant::find($id);
foreach ($ateliers as $idy) {
  $atelier=\App\Atelier::find($idy['id']);
  
  if( $participant->ateliers->contains($atelier)   )
    {
    }
    else {
      
          if($atelier->places>0)
          {
            $atelier->places=$atelier->places-1;
            $participant->ateliers()->attach( $atelier , ['type' => 'confirmer']);
          }
          else
          {
            if($atelier->reserve >0 )
            {
              $atelier->reserve=$atelier->reserve-1;
              $participant->ateliers()->attach($atelier , ['type' => 'reserve']);
            }
          }
          $atelier->update();
    }

}
$participant=Participant::find($id)->with('ateliers')->first();


      return response()->json(['participant'=>$participant],200);

    }
}
