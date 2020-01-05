@component('mail::message')
# Reminders to work on

You have some reminders to follow up. Below are the details:

@component('mail::table')
|Reminder|Lead name|Phone|
|:-------|:--------|:----|
@foreach($reminders as $reminder)
|{{$reminder['reminder']}}|{{$reminder['lead']['name']}}|{{$reminder['lead']['phone']}}|
@endforeach
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
