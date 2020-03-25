<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::query()
            ->orderBy('renewal_date')
            ->paginate(10);

        return Inertia::render('Subscribers/Index', [
            'subscribers' => $subscribers,
        ]);
    }
}
