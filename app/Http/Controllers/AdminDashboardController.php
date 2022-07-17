<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\User;
use App\Models\StatusAcara;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.profil', [
            'title' => "Profil Saya",
            'user' => auth()->user()
        ]);
    }
}
