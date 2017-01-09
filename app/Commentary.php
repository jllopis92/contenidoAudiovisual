<?php

namespace contenidoAudiovisual;

use Illuminate\Database\Eloquent\Model;

class Commentary extends Model
{
    protected $table = "commentaries";
    protected $fillable = ['movie_id','user_id','text','valid','created_at'];
}
