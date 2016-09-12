<?php

namespace contenidoAudiovisual;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    protected $table = "advertising";
    protected $fillable = ['movie_id','name','description','priority','image'];
}
