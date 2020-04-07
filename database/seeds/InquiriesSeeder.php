<?php

use Illuminate\Database\Seeder;

class InquiriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Inquiry::class, 10)->create();
    }
}
