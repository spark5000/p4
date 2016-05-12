<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $user_id = \App\
        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'Stop by at a groceries store',
            'priority' => 2,
            'completed' => 0,
            'user_id' => 1,
        ]);

        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'Meeting with Sam',
            'priority' => 1,
            'completed' => 0,
            'user_id' => 1,
        ]);

        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'Call Jamal to set up a meeting',
            'priority' => 2,
            'completed' => 1,
            'user_id' => 1,
        ]);

        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'Meeting with Jamal',
            'priority' => 2,
            'completed' => 1,
            'user_id' => 1,
        ]);

        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'Meeting with Jill',
            'priority' => 2,
            'completed' => 1,
            'user_id' => 2,
        ]);

        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'priority' => 1,
            'completed' => 0,
            'user_id' => 1,
        ]);

        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'Ut tempus auctor fermentum',
            'priority' => 3,
            'completed' => 0,
            'user_id' => 1,
        ]);

        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'Quisque aliquam libero a dapibus dignissim',
            'priority' => 2,
            'completed' => 0,
            'user_id' => 1,
        ]);

        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'Cras vulputate sapien at lorem finibus euismod',
            'priority' => 3,
            'completed' => 0,
            'user_id' => 1,
        ]);

        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'Vivamus fringilla risus ac felis eleifend rhoncus',
            'priority' => 1,
            'completed' => 0,
            'user_id' => 1,
        ]);

        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'Integer sit amet lorem eu libero placerat molestie',
            'priority' => 1,
            'completed' => 0,
            'user_id' => 1,
        ]);

        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'Morbi rutrum bibendum nunc non sollicitudin',
            'priority' => 3,
            'completed' => 1,
            'user_id' => 1,
        ]);

    }
}
