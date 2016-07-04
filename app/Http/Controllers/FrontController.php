<?php

namespace contenidoAudiovisual\Http\Controllers;

use Illuminate\Http\Request;

use contenidoAudiovisual\Http\Requests;

class FrontController extends Controller
{
   public function index(){
        return view('index');
   }

   public function contacto(){
        return view('contacto');
   }

   public function reviews(){
        return view('reviews');
   }

}
