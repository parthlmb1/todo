<?php

namespace App\Http\Controllers;

use App\ToDoList;
use Illuminate\Http\Request;

class ListsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showListsView()
    {
        return view("Lists.lists");
    }

    /**
     * @return ToDoList[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllLists()
    {
        return [ "data" => ToDoList::getAllToDoLists()];
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * @return string
     */
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateListDetails(Request $request)
    {

        if (empty($request->all())) {
            return response()->json(["success" => false, "message" => "Request is empty"], 422);
        }

        if (empty($request->id)) {
            return response()->json(["success" => false, "message" => "List ID is required"], 422);
        }


        if (!ToDoList::findListWithID($request->id)) {
            return response()->json(["success" => false, "message" => "Invalid List ID"], 422);
        }

        if (empty($request->name)) {
            return response()->json(["success" => false, "message" => "List Name id required"], 422);
        }

        if (empty($request->description)) {
            return response()->json(["success" => false, "message" => "List description is required"], 422);
        }

        $list = new ToDoList(
            $request->id,
            $request->name,
            $request->description
        );

        if ($list->updateListDetails()) {
            return response()->json(["success" => false, "message" => "List updated"], 200);
        }

        return response()->json(["success" => false, "message" => "List could not be updated"], 422);
    }

}
