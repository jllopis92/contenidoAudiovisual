<?php

namespace contenidoAudiovisual;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Subtitle extends Model
{
    protected $table = "subtitles";

    protected $fillable = ['video_id','trailer_id','language','url'];

    public function setUrlAttribute($url){

        $this->attributes['url'] = Carbon::now()->second.$url->getClientOriginalName();
        $name = Carbon::now()->second.$url->getClientOriginalName(); 
        \Storage::disk('local')->put($name, \File::get($url));
    }
}
