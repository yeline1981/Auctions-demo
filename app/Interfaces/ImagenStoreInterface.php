<?php namespace App\Interfaces;

use App\Http\Requests\StoreImageRequest;

interface ImageStoreInterface
{
    public function store(StoreImageRequest $file);
}