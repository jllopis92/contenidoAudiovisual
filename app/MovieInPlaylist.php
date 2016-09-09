<?php

namespace contenidoAudiovisual;

use Illuminate\Database\Eloquent\Model;

class MovieInPlaylist extends Model
{
    protected $table = "movie_in_playlist";
    protected $fillable = ['playlist_id','movie_id','url','duration', 'state'];
}
