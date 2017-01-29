<?php

namespace contenidoAudiovisual;

use Illuminate\Database\Eloquent\Model;

class MovieInProgram extends Model
{
    protected $table = "movies_in_programations";
    protected $fillable = ['programation_id','movie_id','name','url','start_date','end_date'];
}
