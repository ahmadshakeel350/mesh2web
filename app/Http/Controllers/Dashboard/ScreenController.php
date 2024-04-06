<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;


class ScreenController extends Controller
{
    public function screens(): View
    {
        $user = Auth::user();
        return view('dashboard.screens', [
            'user' => $user,
            'page' => "screens"
        ]);
    }
}
