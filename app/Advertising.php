<?php

namespace contenidoAudiovisual;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class Advertising extends Model
{
    protected $table = "advertising";
    protected $fillable = ['movie_id','name','description','image', 'link', 'state'];

    public function setImageAttribute($image){
      if (isset($image)) {
        $this->attributes['image'] = Carbon::now()->second.$image->getClientOriginalName();
        $name = Carbon::now()->second.$image->getClientOriginalName(); 
        \Storage::disk('local')->put($name, \File::get($image));
        //$this->attributes['imageRef'] = Carbon::now()->second.$imageRef;
        //$newName = $this->attributes['imageRef'];
       /* $name = Carbon::now()->second.$imageRef->getClientOriginalName(); 
       \Storage::disk('local')->put($name, \File::get($imageRef));*/

        $img = Image::make('files/'.$name)->resize(1080, 600);
        $img->save();
        //echo "resize";
      }else{

      }

            
   

}
}
