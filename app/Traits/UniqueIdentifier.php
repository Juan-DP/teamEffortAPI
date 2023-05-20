<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait UniqueIdentifier
{
    public static function booted()
    {
        static::creating(function (Model $model) {
            $model->uid = Str::uuid();
        });
    }
}