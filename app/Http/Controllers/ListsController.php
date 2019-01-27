<?php

namespace App\Http\Controllers;

use App\ToDoList;
use Illuminate\Http\Request;

class ListsController extends Controller {

    public function getAllLists() {
        return ToDoList::getAllToDoLists();
    }

}
