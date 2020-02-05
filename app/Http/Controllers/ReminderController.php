<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Reminder;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReminderController extends Controller
{
    public function add(Lead $lead)
    {
        return Inertia::render('Leads/LeadReminderAdd', [
            'lead' => $lead
        ]);
    }

    public function store(Request $request)
    {
        $postData = $this->validate($request, [
            'reminder' => 'required|min:3',
            'reminder_date' => 'required|date',
            'lead_id' => 'required|exists:leads,id'
        ]);

        $postData['user_id'] = $request->user()->id;
        $postData['status'] = 'pending';

        $lead = Lead::find($postData['lead_id']);

        $lead->reminders()
            ->create($postData);

        return redirect()
            ->route('lead.view', [$lead]);
    }

    public function view(Lead $lead, Reminder $reminder)
    {
        return Inertia::render('Leads/ReminderView', [
            'lead' => $lead,
            'reminder' => $reminder,
        ]);
    }

    public function updateAndCreate(Request $request)
    {
        $postData = $this->validate($request, [
            'reminder_id' => 'required|exists:reminders,id',
        ]);

        $reminder = Reminder::findOrFail($postData['reminder_id']);
        $reminder->status = 'completed';
        $reminder->save();

        $lead = Lead::find($reminder->lead_id);

        return redirect(route('reminder.add', ['lead' => $lead]));
    }
}
