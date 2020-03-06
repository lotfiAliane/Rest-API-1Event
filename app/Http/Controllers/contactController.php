<?php

namespace App\Http\Controllers;

use App\contact;
use App\Http\Requests\contactyRequest;
use Illuminate\Http\Request;

class contactController extends Controller
{
    //
    public function create()
    {
      return view('contact.create');
    }

    public function store(contactyRequest $request)
    {
      $contact = new \App\contact;
      $contact->email=$request->email;
      $contact->message=$request->message;
      $contact->save();
    }
}
