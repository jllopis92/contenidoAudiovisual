<?php

namespace contenidoAudiovisual;

use Illuminate\Database\Eloquent\Model;

class SendBy extends Model
{
    protected $table = "SeenBy";
    protected $fillable = ['movie_id','user_id'];
}
