<?php

namespace contenidoAudiovisual;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Movie extends Model
{
    protected $table = "movies";

    protected $fillable = ['usuario_id','asignatura_id','name','language','creation_date','description','imageRef','url','production_year','direction','direction_assistant','casting','continuista','script','production','production_assistant','photografic_direction','camara','camara_assistant','art_direction','sonorous_register','mounting','image_postproduction','sound_postproduction','catering','music','actors'];

    public function setImageRefAttribute($imageRef){

        $this->attributes['imageRef'] = Carbon::now()->second.$imageRef->getClientOriginalName();
        $name = Carbon::now()->second.$imageRef->getClientOriginalName(); 
        \Storage::disk('local')->put($name, \File::get($imageRef));
    }
    public function setUrlAttribute($url){

        $this->attributes['url'] = Carbon::now()->second.$url->getClientOriginalName();
         $name = Carbon::now()->second.$url->getClientOriginalName();
        \Storage::disk('local')->put($name, \File::get($url));
    }
    public static function Movies(){
        return DB::table('movies')
            ->join('subjects','subjects.id','=','movies.asignatura_id')
            ->select('movies.*')
            ->get();
    }
}
