<div class="m-2" x-data="{open: false}">
    <div class="rounded-lg shadow-lg border-2 p-2">
        <div class="w-full cursor-pointer">
            <div class="flex items-center justify-between" @click="open = !open" >
                <h3 class="text-lg uppercase text-gray-800">{{$list->title}}</h3>
                <div x-show="!open">
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div x-show="open">
                    <i class="fas fa-chevron-up"></i>
                </div>
            </div>
            <div x-show="open" class="p-4 relative">
                <div><span class="mb-2" wire:click="showForm()" class="text-sm"><i class="fas fa-plus mr-2"></i>Add Task</span></div>
                @if($showForm)
                    <div class="my-2 flex items-center">
                        <div class="w-full sm:w-1/4 sm:mr-2">
                            @include('partials._text-field-input', ['model' => 'name', 'label' => 'Task Name'])
                        </div>
                        <div class="w-full sm:w-1/6">
                            @include('partials._text-field-input', ['model' => 'due_by', 'label' => 'Due Date/Time', 'type' => 'datetime-local'])
                        </div>
                    </div>
                    <div class="flex">
                        <button wire:click="createTask()" class="mx-1 bg-green-700 px-4 py-2 rounded text-white hover:bg-green-800 my-4">
                            <span>Save</span>
                        </button>
                        <button wire:click="cancel()" class="mx-1 bg-red-700 px-4 py-2 rounded text-white hover:bg-red-800 my-4">
                            <span>Cancel</span>
                        </button>
                    </div>
                @endif
                @foreach($tasks as $task)
                    <livewire:user-to-do-task :task="$task" :key="$task->id"/>
                @endforeach
            </div>
        </div>
    </div>
</div>
