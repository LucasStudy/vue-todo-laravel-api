<?php

namespace App\Http\Controllers;

use App\Model\TodoList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoListController extends Controller
{
    //

    public function index(Request $request) {
        $todoLists = TodoList::all();
        return response()->json(['lists' => $todoLists]);
    }
    public function store(Request $request) {
        $todoList = new TodoList();
        $todoList->title = $request->title;
        $todoList->time_limit = $request->time_limit;
        $todoList->status = $request->status;
        $todoList->save();
        return response()->json($todoList);
    }

    public function update($id, Request $request) {
        try {
            $todoList = TodoList::find($id);
            $todoList->update($request->except(['id']));
        } catch (\Exception $e) {
            return response()->json(["status"=>false]);
        }
        return response()->json(["status"=>true]);
    }

    public function doing($id) {
        try {
            $todoList = TodoList::find($id);
            $todoList->status = TodoList::DOING_STATUS;
            $todoList->save();
        } catch (\Exception $e) {
            return response()->json(["status"=>false]);
        }
        return response()->json(["status"=>true]);
    }

    public function done($id) {
        try {
            $todoList = TodoList::find($id);
            $todoList->status = TodoList::DONE_STATUS;
            $todoList->save();
        } catch (\Exception $e) {
            return response()->json(["status"=>false]);
        }
        return response()->json(["status"=>true]);
    }

    public function destroy($id) {
        try {
            $todoList = TodoList::find($id);
            $todoList->delete();
        } catch (\Exception $e) {
            return response()->json(["status"=>false]);
        }
        return response()->json(["status"=>true]);
    }
}
