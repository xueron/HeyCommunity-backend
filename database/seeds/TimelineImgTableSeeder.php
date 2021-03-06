<?php

use Illuminate\Database\Seeder;

class TimelineImgTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\User::lists('id')->toArray();
        $timelines = \App\Timeline::lists('id')->toArray();

        $faker = Faker\Factory::create();

        $data = [];
        $imgs = [];
        foreach (range(1, 66) as $index) {
            $timelineId = $faker->randomElement($timelines);
            $imgId = $index;

            $data[] = [
                'id'            =>      $imgId,
                'user_id'       =>      $faker->randomElement($users),
                'uri'           =>      $faker->imageUrl(),

                'created_at'    =>  $faker->dateTimeThisMonth(),
                'updated_at'    =>  $faker->dateTimeThisMonth(),
            ];

            if (!isset($imgs[$timelineId])) {
                $imgs[$timelineId] = [];
            }
            array_push($imgs[$timelineId], $imgId);
        }
        \App\TimelineImg::insert($data);


        foreach ($imgs as $timelineId => $value) {
            $Timeline = \App\Timeline::findOrFail($timelineId);
            $Timeline->update(['imgs' => json_encode($value)]);
        }
    }
}
