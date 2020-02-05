<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $reminds = Reminder::query()
            ->with(['lead'])
            ->where('reminders.reminder_date', now()->format('Y-m-d'))
            ->where('reminders.user_id', Auth::user()->id)
            ->where('reminders.status', 'pending')
            ->get();

        $data = [
            'fname' => 'Amitav',
            'lname' => 'Roy',
            'reminders' => $reminds
        ];

        return Inertia::render('Dashboard/Index', $data);
    }
}
