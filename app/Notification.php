<?php

namespace contenidoAudiovisual;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = "notifications";
    protected $fillable = ['send_to','user_id','user_name','movie_id','movie_name','reason','display','watch'];
}
