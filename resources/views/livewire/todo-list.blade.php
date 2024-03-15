<div class="border-2 rounded-lg w-[30rem] h-[20rem] flex flex-col justify-center items-center mx-auto">
      <div class="w-full p-4">
        <input type="text" wire:model="task" wire:keydown.enter="addtodo" placeholder="add todo" class="w-full mb-4 border rounded-lg">
        @forelse ($todos as $todo)
            <div class="flex items-center mb-2">
                @if($todo->status == 'open')
                <input type="checkbox" id="todo-{{$todo->id}}" wire:change="markDone({{$todo->id}})" class="mr-2 rounded-md">
                @endif
                <label for="todo-{{$todo->id}}" class="{{($todo->status == 'done') ? 'line-through' : ''}}">{{$todo->task}}</label>
                @if(tdo)
                <button wire:click="remove({{$todo->id}})">delete</button>
            </div>   
        @empty
            <p>No todos yet.</p>
        @endforelse
    </div>
</div>
