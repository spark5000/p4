<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function tasks() {
        return $this->belongsToMany('\App\Task')->withTimestamps();
    }

    public static function getTagsForCheckboxes() {
        $tags = \App\Tag::orderBy('name','ASC')->get();

        $tags_for_checkboxes = [];

        foreach($tags as $tag) {
            $tags_for_checkboxes[$tag['id']] = $tag['name'];
        }

        return $tags_for_checkboxes;
    }

}
