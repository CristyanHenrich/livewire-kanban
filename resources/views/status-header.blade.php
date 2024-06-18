<div class="{{$styles['statusHeader']}}" x-data="{ editing: false , newColunaName: @entangle('newColunaName')}" @click.away="editing=false" >
   <div class="flex justify-between">
    <p class="w-full" x-show="!editing" x-on:click="editing = true"> {{$status['title']}}</p>
   </div>
    <div x-show="editing" class="flex">
        <input type="text" x-model="newColunaName"
            class="w-auto p-2 border-none rounded-sm bg-gray-50 border-gray-100 focus:ring-0">
        <button wire:click="editColuna({{$status['id']}})" x-on:click="editing=false" class="bg-gray-50 hover:bg-gray-300 rounded-lg text-sm my-2 px-2">
            Salvar
        </button>
    </div>
</div>
