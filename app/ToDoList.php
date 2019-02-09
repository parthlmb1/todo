<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{

    protected $table = "lists";

    protected $fillable = ["name", "description", "status", "created_at", "updated_at", "deleted_at"];

    protected $hidden = ["deleted_at"];

    private $id;
    private $name;
    private $description;
    private $status;

    public function __construct($id = "", $name = "", $description = "")
    {
        parent::__construct();
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

    /**
     * saves list in DB
     * @return bool
     */
    public function saveList()
    {
        $list = new ToDoList();
        $list->id = $this->id;
        $list->name = $this->name;
        $list->description = $this->description;
        $list->status = $this->status;
        return $list->save() ? true : false;
    }

    /**
     * finds the list with given ID
     * @param $id
     * @return bool
     */
    public static function findListWithID($id)
    {
        return !empty(ToDoList::find($id));
    }

    /**
     * Update list details
     * @return bool
     */
    public function updateListDetails()
    {
        $updateList = ToDoList::where("id", "=", $this->id)
            ->update([
                "name" => $this->name,
                "description" => $this->description
            ]);
        return $updateList ? true : false;
    }

}