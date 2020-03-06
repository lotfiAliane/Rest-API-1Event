<?php

namespace App\Repository;

use Illuminate\Http\UploadedFile;

Interface PhotoRepositoryInterface
{

  public function save(UploadedFile $image);
}
