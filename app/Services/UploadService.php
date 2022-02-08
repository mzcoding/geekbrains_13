<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\UploadedFile;

class UploadService
{
	/**
	 * @param UploadedFile $file
	 * @return string
	 * @throws \Exception
	 */
   public function start(UploadedFile $file): string
   {
	   $completedFile = $file->storeAs('news', $file->hashName(), 'public');
	   if(!$completedFile) {
		   throw new \Exception("File wasn't upload");
	   }

	   return $completedFile;
   }
}