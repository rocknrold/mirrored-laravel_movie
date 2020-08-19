<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
        'name','story','released_at','duration','info'
    ];

    public function genre()
    {
    	return $this->belongsTo(Genre::class);
    }

    public function certificate()
    {
    	return $this->belongsTo(Certificate::class);
    }

    public function filmProducers(){
        return $this->hasMany(FilmProducer::class);
    }

    public function actorRoles(){
        return $this->hasMany(ActorRole::class);
    }

    public function filmUsers(){
        return $this->hasMany(FilmUser::class);
    }
}
