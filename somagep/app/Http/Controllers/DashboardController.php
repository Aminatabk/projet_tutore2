<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;

        if ($role === 'admin') {
            return redirect('/admin/dashboard');
        } elseif ($role === 'agent') {
            return redirect('/agent/dashboard');
        }

        return redirect('/client/dashboard');
    }
}
