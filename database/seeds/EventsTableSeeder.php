<?php

use Illuminate\Database\Seeder;
use App\Events;
use Carbon\Carbon;
class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Events::truncate();
        Events::create([
          'title'=>'UT AUT REICIENDIS FACERE POSSIMUS',
          'image'=>'15.jpg',
          'event_datetime'=>Carbon::parse('2017-01-01 3:00:00'),
          'description'=>'Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est.',
          'user_id'=>1
        ]);
        Events::create([
          'title'=>'MAXIME PLACEAT FACERE POSSIMUS',
          'image'=>'19.jpg',
          'event_datetime'=>Carbon::parse('2017-01-01 3:30:00'),
          'description'=>'Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est.',
          'user_id'=>1
        ]);
    }
}
