<?php

use App\Models\Subscriber;
use Carbon\Carbon;
use App\Models\Lead;
use App\Models\Package;
use App\Models\Reminder;
use Illuminate\Database\Seeder;

class InitialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createLeadsData();
        $this->createReminders();
        $this->createPackages();
        $this->createSubscribers();
    }

    private function createLeadsData()
    {
        Lead::create([
            'name' => 'Mark Wood',
            'email' => 'mark.wood@worldweb.com',
            'phone' => '+9198670000',
            'interested_package' => 'Yearly package',
            'dob' => Carbon::parse('08/08/1986'),
            'age' => Carbon::parse('08/08/1986')->age,
            'branch_id' => 1,
            'added_by' => 1,
        ]);

        Lead::create([
            'name' => 'Jesse Wood',
            'email' => 'jwood@worldweb.com',
            'phone' => '+9198660000',
            'interested_package' => 'Yearly package',
            'dob' => Carbon::parse('04/03/1987'),
            'age' => Carbon::parse('04/03/1987')->age,
            'branch_id' => 1,
            'added_by' => 1,
        ]);

        Lead::create([
            'name' => 'James Smith',
            'email' => 'james.smith@outlook1.com',
            'phone' => '+9187660012',
            'interested_package' => 'Yearly package',
            'dob' => Carbon::parse('02/01/1986'),
            'age' => Carbon::parse('02/01/1986')->age,
            'branch_id' => 1,
            'added_by' => 1,
        ]);

        Lead::create([
            'name' => 'Shane Hope',
            'email' => 'shane.hope@gmail.om',
            'phone' => '+9187650012',
            'interested_package' => 'Monthly package',
            'dob' => Carbon::parse('02/05/1982'),
            'age' => Carbon::parse('02/05/1982')->age,
            'branch_id' => 1,
            'added_by' => 1,
        ]);

        Lead::create([
            'name' => 'Alan Lamb',
            'email' => 'alan.lamb@gmail.om',
            'phone' => '+9182430012',
            'interested_package' => 'Yearly package',
            'dob' => Carbon::parse('02/07/1991'),
            'age' => Carbon::parse('02/07/1991')->age,
            'branch_id' => 1,
            'added_by' => 1,
        ]);

        Lead::create([
            'name' => 'Zuber Khan',
            'email' => 'zuber.khan@gmail.om',
            'phone' => '+9178630012',
            'interested_package' => 'Yearly package',
            'dob' => Carbon::parse('03/07/1993'),
            'age' => Carbon::parse('03/07/1993')->age,
            'branch_id' => 1,
            'added_by' => 1,
        ]);

        Lead::create([
            'name' => 'Amit Powar',
            'email' => 'amitp@yahoo.om',
            'phone' => '+9177630012',
            'interested_package' => 'Yearly package',
            'dob' => Carbon::parse('09/09/1983'),
            'age' => Carbon::parse('09/09/1983')->age,
            'branch_id' => 1,
            'added_by' => 1,
        ]);

        Lead::create([
            'name' => 'Sahil Sharma',
            'email' => 'sahil.sharma@outlook.om',
            'phone' => '+9177690012',
            'interested_package' => 'Monthly package',
            'dob' => Carbon::parse('01/09/1984'),
            'age' => Carbon::parse('01/09/1984')->age,
            'branch_id' => 1,
            'added_by' => 1,
            'active' => 0,
        ]);

        Lead::create([
            'name' => 'Kunal kabra',
            'email' => 'kunal.kabra@outlook.om',
            'phone' => '+9178670012',
            'interested_package' => 'Monthly package',
            'dob' => Carbon::parse('09/09/1983'),
            'age' => Carbon::parse('09/09/1983')->age,
            'branch_id' => 1,
            'added_by' => 1,
        ]);

        Lead::create([
            'name' => 'Nicholas Puran',
            'email' => 'nic.p@outlook.om',
            'phone' => '+9170012',
            'interested_package' => 'Monthly package',
            'dob' => Carbon::parse('11/11/1985'),
            'age' => Carbon::parse('11/11/1985')->age,
            'branch_id' => 1,
            'added_by' => 1,
            'active' => 0,
        ]);

        Lead::create([
            'name' => 'Nancy Patel',
            'email' => 'npatel@outlook.om',
            'phone' => '+917044012',
            'interested_package' => 'Monthly package',
            'dob' => Carbon::parse('12/12/1987'),
            'age' => Carbon::parse('12/12/1987')->age,
            'branch_id' => 1,
            'added_by' => 1,
            'active' => 0,
        ]);
    }

    private function createReminders()
    {
        Reminder::create([
            'lead_id' => 11,
            'user_id' => 1,
            'reminder' => 'Call to check on the membership',
            'reminder_date' => Carbon::now()->subDays(3),
            'note' => 'Customer asked to call again after 2 days.',
            'status' => 'completed',
        ]);

        Reminder::create([
            'lead_id' => 11,
            'user_id' => 1,
            'reminder' => 'A reminder to call the customer again.',
            'reminder_date' => Carbon::now()->addDays(2),
            'status' => 'pending',
        ]);

        Reminder::create([
            'lead_id' => 9,
            'user_id' => 1,
            'reminder' => 'A reminder to call the customer again.',
            'reminder_date' => Carbon::now()->addDays(2),
            'note' => 'Not interested in a plan.',
            'status' => 'completed',
        ]);
    }

    private function createPackages()
    {
        Package::create([
            'name' => 'Monthly package',
            'amount' => 1000,
            'number_of_days' => 30,
            'status' => 'active',
        ]);

        Package::create([
            'name' => 'Half yearly package',
            'amount' => 5000,
            'number_of_days' => 180,
            'status' => 'active',
        ]);

        Package::create([
            'name' => 'Yearly package',
            'amount' => 10000,
            'number_of_days' => 365,
            'status' => 'active',
        ]);
    }

    private function createSubscribers()
    {
        Subscriber::create([
            'lead_id' => 8,
            'package_id' => 3,
            'renewal_date' => now()->addMonths(12),
            'amount' => 10000,
            'name' => 'Sahil Sharma',
            'email' => 'sahil.sharma@outlook.om',
            'phone' => '+9177690012',
            'age' => 36,
            'interested_package' => 'Yearly package',
            'dob' => '1984-01-09',
            'branch_id' => 1,
            'added_by' => 1,
        ]);

        Subscriber::create([
            'lead_id' => 10,
            'package_id' => 1,
            'renewal_date' => now()->addMonths(1),
            'amount' => 1000,
            'name' => 'Nicholas Puran',
            'email' => 'nic.p@outlook.om',
            'phone' => '+9170012',
            'age' => 34,
            'interested_package' => 'Monthly package',
            'dob' => '1985-11-11',
            'branch_id' => 1,
            'added_by' => 1,
        ]);

        Subscriber::create([
            'lead_id' => 11,
            'package_id' => 2,
            'renewal_date' => now()->addMonths(6),
            'amount' => 5000,
            'name' => 'Nancy Patel',
            'email' => 'Nancy Patel',
            'phone' => '+917044012',
            'age' => 32,
            'interested_package' => 'Half yearly package',
            'dob' => '1987-12-12',
            'branch_id' => 1,
            'added_by' => 1,
        ]);
    }
}
