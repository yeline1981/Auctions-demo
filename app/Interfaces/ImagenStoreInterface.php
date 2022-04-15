<?php namespace App\Interfaces;

use App\User;

interface ImageStoreInterface
{
    public function store($uploader, $owner, StoreImageRequest $file);
}