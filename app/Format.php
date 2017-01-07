<?php

namespace contenidoAudiovisual;

use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    protected $table = "formats";
    protected $fillable = ['name','valid'];
}
