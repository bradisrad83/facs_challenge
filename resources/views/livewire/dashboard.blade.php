<div class="w-full">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <div class="flex justify-between">
            <h2 class="text-2xl font-bold">To Do Lists</h2>
            @if($lists->isEmpty())
                <button wire:click="newList()" class="px-4 py-2 bg-green-700 hover:bg-green-800 text-white rounded">New List</button>
            @endif
        </div>
        @if($showForm)
            <div class="p-4 my-4">
                <div class="w-full sm:w-1/2">
                    @include('partials._text-field-input', ['model' => 'title', 'label' => 'List Title'])
                </div>
                <div class="flex">
                    <button wire:click="create()" class="mx-1 bg-green-700 px-4 py-2 rounded text-white hover:bg-green-800 my-4">
                        <span>Save</span>
                    </button>
                    <button wire:click="cancel()" class="mx-1 bg-red-700 px-4 py-2 rounded text-white hover:bg-red-800 my-4">
                        <span>Cancel</span>
                    </button>
                </div>
            </div>
        @endif
        @if($lists->isEmpty() && !$showForm)
        <div class="px-6 py-2 sm:py-0">
            <p class="text-red-800 text-xl">***You currently have not To Do Lists created.  Click the button on the right to add your first list!!!</p>
        </div>
        @else
            @foreach($lists as $list)
                <div>
                    <livewire:user-to-do-list :list="$list" :key="$list->id"/>
                </div>
            @endforeach
        @endif
    </div>
</div>
