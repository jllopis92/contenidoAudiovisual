<?php

namespace contenidoAudiovisual;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = "subjects";

    protected $fillable = ['profesor_id','name'];
}
