<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\todo;

class TodoList extends Component

{
    public $todos;
    public $task='';
  

    function mount(){
        $this->fetchTodos();
    }

    function fetchTodos(){
        $this->todos = todo::all()->reverse();
    }

    function addtodo(){
        if($this->task !=''){
            $todo= new todo();
            $todo->task = $this->task;
            $todo->description = '';
            $todo->save();
            $this->task = '';
            $this->fetchTodos();
        }
    }

    function markDone(Todo $todo){
        $todo->status = 'done';
        $todo->save();
        $this->fetchTodos();
    }

    function removeTodo(Todo $todo){
        $todo->delete();
    }

    public function render()
    {
        return view('livewire.todo-list');
    }
}

