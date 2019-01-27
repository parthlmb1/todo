<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model {

    protected $table = "lists";

    protected $fillable = ["name", "description", "status", "created_at", "updated_at", "deleted_at"];

    private $id;
    private $name;
    private $description;
    private $status;

    /**
     * fetches and shows the list of all To-Do Lists
     *
     * @return ToDoList[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getAllToDoLists() {
        return ToDoList::all();
    }

}
