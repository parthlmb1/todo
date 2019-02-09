<?php

namespace App\Http\Controllers;

use App\ToDoList;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Translation\Catalogue\TargetOperation;

class ListsController extends Controller
{

    public function showListsView()
    {
        return view("Lists.lists");
    }

    public function getAllLists()
    {
        return ToDoList::getAllToDoLists();
    }

    public function createNewList(Request $request)
    {

        if (empty($request->all())) {
            return response()->json(["success" => false, "message" => "Request is empty"], 422);
        }

        if (empty($request->name)) {
            return response()->json(["success" => false, "message" => "Name is required"], 422);
        }

        if (empty($request->description)) {
            return response()->json(["success" => false, "message" => "Description is required"], 422);
        }

        $list = new ToDoList(
            $this->generateUUID(),
            $request->name,
            $request->description
        );

        if ($list->saveList()) {
            return response()->json(["success" => true, "message" => "List created"], 200);
        }

        return response()->json(["success" => false, "message" => "List could not be created"], 422);
    }

    private function generateUUID()
    {
        $hash = sha1("RandomTextPrivateKey", false);
        return sprintf(
            '%s-%s-5%s-%s-%s',
            substr($hash, 0, 8),
            substr($hash, 8, 4),
            substr($hash, 17, 3),
            substr($hash, 24, 4),
            substr($hash, 32, 12)
        );
    }
}
