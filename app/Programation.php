<?php

namespace contenidoAudiovisual;

use Illuminate\Database\Eloquent\Model;

class Programation extends Model
{
    protected $table = "programations";
    protected $fillable = ['duration','play_at','end_at'];

}
