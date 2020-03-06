<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class usersController extends Controller
{
    //

    public function create()
    {
      return view('users.info');
    }

    public function store(ContactRequest $request)
    {

      dd($request->nom);
    }
}
