<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //




 public function searchUsers(Request $request)
    {
        $search = $request->input('search');

        // Perform the search query (assuming 'email' field)   '%' .
        $users = User::where('email', 'like', $search . '%')->get();

        return response()->json($users);
    }




}
