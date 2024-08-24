<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagesetting;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class SettingsController extends Controller
{
    public function index(){

        $user = Auth::user(); // Get the authenticated user

$files = Imagesetting::where('is_active','=','1')->get();
//dd($files);
       return view('settings.index',compact('files','user')); // Return the home view

    }

    // Show the form to update user image settings
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $files = Imagesetting::all(); // Get all available imagesettings

        return view('settings.index', compact('user', 'files'));
    }

    // Handle the form submission to update image settings
    public function update(Request $request, $id)
    {
        $request->validate([
            'snd' => 'nullable|exists:imagesettings,id',
            'rcv' => 'nullable|exists:imagesettings,id',
        ]);

        $user = User::findOrFail($id);
        if( $request->input('snd')) {
            $user->snd = $request->input('snd');
        }else {
            $user->rcv = $request->input('rcv');
        }
        $user->save();

        return redirect()->route('settings.edit', ['id' => $id])
            ->with('success', 'Image settings updated successfully.');
    }







}
