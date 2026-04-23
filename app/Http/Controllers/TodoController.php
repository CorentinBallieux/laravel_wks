<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return Todo::query()->get();
    }

    public function create()
    {
        $todo = new Todo();
        $todo->name = "faire les courses";
        $todo->completed_at = null;

        $todo->save();

        return $todo;
    }
}
