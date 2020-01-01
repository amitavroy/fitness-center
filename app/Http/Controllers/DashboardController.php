<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'fname' => 'Amitav',
            'lname' => 'Roy',
        ];

        return Inertia::render('Dashboard/Index', $data);
    }
}
