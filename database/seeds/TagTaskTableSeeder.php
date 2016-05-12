<?php

use Illuminate\Database\Seeder;

class TagTaskTableSeeder extends Seeder
{
    public function run()
    {


        $tasks =[
            1 => ['personal'],
            2 => ['personal','family','work'],
            3 => ['personal','work'],
            4 => ['personal','family'],
            5 => ['family'],
            6 => ['family','work'],
            7 => ['personal'],
            8 => ['personal','family','work'],
            9 => ['personal','work'],
            10 => ['personal','family'],
            11 => ['family'],
            12 => ['family','work']
        ];


        foreach($tasks as $id => $tags) {


            $task = \App\Task::where('id','like',$id)->first();


            foreach($tags as $tagName) {
                $tag = \App\Tag::where('name','LIKE',$tagName)->first();


                $task->tags()->save($tag);
            }

        }
    }
}
