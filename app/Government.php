<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Government extends Model
{

    protected $fillable = ['name'];

    public function creator()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    
    public function members(){
        return $this-> hasMany(Member::class,'government_id', 'ID');
    }
}
