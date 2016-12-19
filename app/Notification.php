<?php

namespace contenidoAudiovisual;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = "notifications";
    protected $fillable = ['send_to','user_id','movie_id','reason','display','watch'];
}
