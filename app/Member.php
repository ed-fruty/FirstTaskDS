<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['name','email'];

    public function government()
    {
        return $this->belongsTo(Government::class,'government_id','ID');
    }
}
