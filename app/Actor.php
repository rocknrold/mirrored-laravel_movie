<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{

    protected $fillable = ['name', 'note'];

    public function actorRoles(){
        return $this->hasMany(ActorRole::class);
    }

}