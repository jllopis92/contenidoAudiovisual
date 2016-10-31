<?php

namespace contenidoAudiovisual;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table = "playlists";
    protected $fillable = ['name','duration','state'];
}
