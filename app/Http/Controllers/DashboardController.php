<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {   
        $user = User::where('id', Auth::id())->with('images')->first();
        return view('dashboard.index', compact('user'));        
    }
}
