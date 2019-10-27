<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::query()
            ->where('branch_id', 1)
            ->orderByDesc('id')
            ->get();

        return Inertia::render('Leads/Index', [
            'leads' => $leads
        ]);
    }

    public function create()
    {
        return Inertia::render('Leads/LeadAdd');
    }

    public function store(Request $request)
    {
        $postData = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'dob' => 'required|date',
            'phone' => 'required',
        ]);

        $package = "";
        if ($request->has('package')) {
            $package = $request->input('package');
        }

        Lead::create([
            'name' => $postData['name'],
            'email' => $postData['email'],
            'dob' => $postData['dob'],
            'phone' => $postData['phone'],
            'branch_id' => 1,
            'age' => 1,
            'added_by' => Auth::user()->id,
            'interested_pacakge' => $package,
        ]);

        return redirect()->route('dash');
    }
}
