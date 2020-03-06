<?php

namespace App\Repository;

use App\Repository\PhotoRepositoryInterface;
use Illuminate\Http\UploadedFile;

class PhotoRepository implements PhotoRepositoryInterface
{

  public function save(UploadedFile $image)
  {
    $image->store(config('images.path'), 'public');
  }
}
