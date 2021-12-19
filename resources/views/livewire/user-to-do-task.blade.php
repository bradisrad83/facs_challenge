<div>
    <div class="flex justify-start items-center relative">
        @if($task->isComplete())
            <span wire:click="markActive({{$task}})" class="text-green-700 hover:text-green-800"><i class="fas fa-check mr-3"></i></span>
        @else
            <span wire:click="markCompleted({{$task}})" class="text-red-700 hover:text-red-800"><i class="fas fa-times mr-3"></i></span>
        @endif
        @if($task->deleted_at)
            <span wire:click="deleteItem({{$task}})"class="text-gray-700 hover:text-gray-800"><i class="fas fa-trash-restore mr-3 z-40"></i></span>
        @else
            <span wire:click="deleteItem({{$task}})"class="text-gray-700 hover:text-gray-800"><i class="fas fa-trash-alt mr-3"></i></span>
        @endif
        <p class="text-lg mr-3 {{$task->isComplete() ? 'line-through' : ''}}">{{$task->name}}</p>
        <p class="text-lg mr-3 {{$task->isComplete() ? 'line-through' : ''}}">Due By: {{$task->due_by}}</p>
        @if($task->deleted_at)
            <div class="absolute top-0 left-0 w-full h-full bg-white opacity-50 z-20"></div>
            <p class="text-red-800 font-bold">Deleted At: {{$task->deleted_at}}</p>
        @endif
    </div>
</div>
