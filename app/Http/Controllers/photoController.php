<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImagesRequest;
use App\Repository\PhotoRepositoryInterface;

class photoController extends Controller
{
    //

    public function create()
    {
      return view('image.photo');
    }
    public function store(ImagesRequest $request, PhotoRepositoryInterface $photoRepository)
    {

      $photoRepository->save($request->image);

      return view('image.photo');

    }
}
