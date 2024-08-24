<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagesetting;

class SettingsController extends Controller
{
    public function index(){

$files = Imagesetting::where('is_active','=','1')->get();
//dd($files);
       return view('settings.index',compact('files')); // Return the home view

    }
}
