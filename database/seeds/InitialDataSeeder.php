<?php

use App\Models\Lead;
use Carbon\Carbon;
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
    }

    private function createLeadsData()
    {
        Lead::create([
            'name' => 'Mark Wood',
            'email' => 'mark.wood@worldweb.com',
            'phone' => '+9198670000',
            'interested_package' => 'Annual plan',
            'dob' => Carbon::parse('08/08/1986'),
            'age' => Carbon::parse('08/08/1986')->age,
            'branch_id' => 1,
            'added_by' => 1,
        ]);

        Lead::create([
            'name' => 'Jesse Wood',
            'email' => 'jwood@worldweb.com',
            'phone' => '+9198660000',
            'interested_package' => 'Annual plan',
            'dob' => Carbon::parse('04/03/1987'),
            'age' => Carbon::parse('04/03/1987')->age,
            'branch_id' => 1,
            'added_by' => 1,
        ]);

        Lead::create([
            'name' => 'James Smith',
            'email' => 'james.smith@outlook1.com',
            'phone' => '+9187660012',
            'interested_package' => 'Annual plan',
            'dob' => Carbon::parse('02/01/1986'),
            'age' => Carbon::parse('02/01/1986')->age,
            'branch_id' => 1,
            'added_by' => 1,
        ]);
    }
}
