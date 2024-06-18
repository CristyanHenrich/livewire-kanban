{{-- Injected variables $status, $styles --}}
<div class="{{ $styles['statusWrapper'] }}">

    @include($statusHeaderView, [
        'status' => $status,
    ])

    <div class="{{ $styles['status'] }}" id="{{ $status['id'] }}">

        <div id="{{ $status['statusRecordsId'] }}" data-status-id="{{ $status['id'] }}"
            class="{{ $styles['statusRecords'] }}">

            @forelse ($status['records'] as $record)
                @include($recordView, ['record' => $record])
            @empty
                <button wire:click="criarTarefa({{ $status['id'] }})"
                    class="h-8 w-auto px-2 rounded-lg flex items-center justify-center bg-gray-300 hover:bg-gray-400">
                    <p class="text-sm mr-2 text-gray-800 font-medium"> Criar Tarefa</p>
                    <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                </button>
            @endforelse

        </div>


        @include($statusFooterView, [
            'status' => $status,
        ])
    </div>
</div>
