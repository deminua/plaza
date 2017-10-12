<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  protected $table = 'images';

    protected $fillable = [
        'name',
        'filename',
        'filesize',
        'sorting',
        'avatar',
        'style',
        'imagegable_id',
        'imagegable_type',
    ];

    public function imagetable()
    {
        return $this->morphTo();
    }
}
