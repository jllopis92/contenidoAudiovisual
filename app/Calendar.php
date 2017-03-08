<?php

namespace contenidoAudiovisual;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $table = "calendar";
    protected $fillable = ['title','url','startdate','enddate','start_at','end_at','allDay'];

}