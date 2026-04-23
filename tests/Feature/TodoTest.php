<?php

use App\Models\Todo;

it('creates properly a todo', function () {
    $todo = new Todo();
    $todo->name = "faire les courses";
    $todo->completed_at = null;

    $todo->save();

    $savedTodo = Todo::query()->where('id', $todo->id)->firstOrFail();

    expect($savedTodo)->not->toBeNull();
});
