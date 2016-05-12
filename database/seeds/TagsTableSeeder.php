<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         $data = ['personal','family','work'];

         foreach($data as $tagName) {
             $tag = new \App\Tag();
             $tag->name = $tagName;
             $tag->save();
         }
     }
}
