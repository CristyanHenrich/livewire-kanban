<div>
    <div>
        @includeIf($beforeStatusBoardView)
    </div>

    <div class="flex items-center justify-between  ">


        <div class="flex items-center">
            <p class="text-3xl font-semibold my-4 mr-8"> {{ $quadro['nome'] }}</p>
            <div class="flex -space-x-4 ">
                @foreach ($colaboradores as $colaborador)
                    <img class="inline-block h-12 w-12 rounded-full border-2 border-white dark:border-gray-800"
                        src="{{ $colaborador->usuarioEmitente->imagem }}" alt="Image Description">
                @endforeach
            </div>
            <div class="mx-2">
                <button wire:click="modalColaboradores()"
                    class=" h-12 w-12 rounded-full flex items-center justify-center bg-gray-200 hover:bg-gray-400">
                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z"
                            clip-rule="evenodd" />
                    </svg>

                </button>
            </div>

        </div>
        <button type="button" wire:click="criarTarefa(0)"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">Criar
            tarefa</button>
    </div>

    <div class="flex">
        <div class="{{ $styles['sub-wrapper'] }}">
            <div class="{{ $styles['wrapper'] }}">

                @foreach ($statuses as $status)
                    @include($statusView, ['status' => $status])
                @endforeach


            </div>

        </div>
        <div x-data="{ creating: @entangle('creating'), newColunaName: @entangle('newColunaName') }" class="flex h-auto">
            <button data-tooltip-target="tooltip-coluna" data-tooltip-placement="bottom" type="button" x-show="!creating" wire:click="createColuna()"
                class="bg-gray-50 hover:bg-gray-300 border border-gray-100 rounded-lg p-2 items-center justify-center flex h-10 w-10">
                <span>
                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                </span>
            </button>

            <div id="tooltip-coluna" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                Criar coluna
                <div id="tooltip-coluna" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip"></div>
            </div>

            <div x-show="creating" class="space-y-2 z-40">
                <input type="text" x-model="newColunaName" placeholder="Nome da coluna"
                    class="w-auto p-2 border rounded-sm bg-gray-50 border-gray-100 focus:ring-2 focus:ring-gray-500">
                <div class="flex space-x-2 justify-end">
                    <button wire:click="confirmCreateColuna()"
                        class="bg-gray-50 border border-gray-100 hover:bg-gray-300 rounded-lg p-2.5 flex-shrink-0">
                        <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                d="M5 11.917 9.724 16.5 19 7.5" />
                        </svg>
                    </button>
                    <button @click="$wire.cancelCreateColuna()"
                        class="bg-gray-50 border border-gray-100 hover:bg-gray-300 rounded-lg p-2.5 flex-shrink-0">
                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

    </div>

    @if ($criarTarefaModal)
        @livewire('kanban.modal-create-tarefa-kanban')
    @endif

    @if ($modalTarefa)
        @livewire('kanban.modal-tarefa-kanban')
    @endif

    @if ($modalColaboradores)
        @livewire('kanban.modal-colaboradores-kanban')
    @endif


</div>

<div>
    @includeIf($afterStatusBoardView)
</div>

<div wire:ignore>
    @includeWhen($sortable, 'livewire-status-board::sortable', [
        'sortable' => $sortable,
        'sortableBetweenStatuses' => $sortableBetweenStatuses,
    ])
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/41.3.0/classic/ckeditor.js"></script>
<script src="https://cdn.ckbox.io/ckbox/2.4.0/ckbox.js"></script>
<link rel="stylesheet" href="https://cdn.ckbox.io/ckbox/2.4.0/styles/themes/lark.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/mdbassit/Coloris@latest/dist/coloris.min.css" />
<script src="https://cdn.jsdelivr.net/gh/mdbassit/Coloris@latest/dist/coloris.min.js"></script>
</head>

</div>
