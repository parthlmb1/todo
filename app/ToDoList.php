<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{

    protected $table = "lists";

    protected $fillable = ["name", "description", "status", "created_at", "updated_at", "deleted_at"];

    private $id;
    private $name;
    private $description;
    private $status;

    public function __construct(array $attributes = [], $id = "", $name = "", $description = "")
    {
        parent::__construct($attributes);
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->status = 1;
    }

    /**
     * fetches and shows the list of all To-Do Lists
     * @return ToDoList[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getAllToDoLists()
    {
        return ToDoList::all();
    }

    public function saveList()
    {
        $list = ToDoList::create([
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "status" => $this->status
        ]);

        return $list ? true : false;
    }

}
