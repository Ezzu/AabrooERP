<?php

use Illuminate\Database\Seeder;

class WorkingDaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin\WorkingDaysModel::create([
            'name' => 'Monday',
        ]);
        \App\Models\Admin\WorkingDaysModel::create([
            'name' => 'Tuesday',
        ]);
        \App\Models\Admin\WorkingDaysModel::create([
            'name' => 'Wednesday',
        ]);
        \App\Models\Admin\WorkingDaysModel::create([
            'name' => 'Thursday',
        ]);
        \App\Models\Admin\WorkingDaysModel::create([
            'name' => 'Friday',
        ]);
        \App\Models\Admin\WorkingDaysModel::create([
            'name' => 'Saturday',
        ]);
    }
}
