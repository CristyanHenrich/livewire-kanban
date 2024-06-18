<div>
   <div class="flex justify-between items-center w-full">
        <div class="flex overflow-hidden mr-2">
            <div class="flex flex-nowrap">
                @forelse ($record['tags'] as $tag)
                    <p class="flex justify-between items-center h-6 px-2.5 text-xs font-semibold text-gray-900 bg-[{{ $tag->cor }}] rounded-full mr-1 whitespace-nowrap">
                        {{ $tag->tag }}
                    </p>
                @empty
                    <p class="flex justify-between items-center h-6 px-2.5 text-xs font-semibold text-gray-900 rounded-full"></p>
                @endforelse
            </div>
        </div>
        <div class="text-xs w-[70px] flex-shrink-0">{{ $record['dia'] }}</div>
    </div>

    <p class="my-3 text-sm lowercase"> {{ $record['title'] }}</p>
    <div class="flex items-center w-full mt-3 text-xs font-medium text-gray-400">
        <div class="flex items-center">
            <span class="mr-1"><svg xmlns='http://www.w3.org/2000/svg' width='18' height='18'
                    viewBox='0 0 24 24'>
                    <title>chat_3_line</title>
                    <g id="chat_3_line" fill='none' fill-rule='evenodd'>
                        <path
                            d='M24 0v24H0V0h24ZM12.593 23.258l-.011.002-.071.035-.02.004-.014-.004-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113-.013.002-.185.093-.01.01-.003.011.018.43.005.012.008.007.201.093c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.004-.011.017-.43-.003-.012-.01-.01-.184-.092Z' />
                        <path fill='#09244BFF'
                            d='M12 5c-4.597 0-8 3.073-8 6.5 0 2.014 1.141 3.872 3.042 5.096.738.476.939 1.403.972 2.222.753-.31 1.258-1.16 2.172-.986.582.11 1.189.168 1.814.168 4.597 0 8-3.073 8-6.5S16.597 5 12 5ZM2 11.5C2 6.643 6.656 3 12 3s10 3.643 10 8.5S17.344 20 12 20c-.653 0-1.292-.053-1.911-.155-.093.073-.253.205-.45.344C9.07 20.59 8.249 21 7 21a1 1 0 0 1-1-1c0-.55.143-1.234-.094-1.756C3.577 16.723 2 14.298 2 11.5Z' />
                    </g>
                </svg></span>
            <span class="ms-1 leading-none"> {{ $record['comentarios']->count() }}</span>
        </div>

        <div class="flex -space-x-1 w-full">
            @forelse ($record['colaboradores'] as $colaborador)
                <img class="inline-block w-7 h-7 ms-auto rounded-full border-2 border-white dark:border-gray-800"
                    src="{{ $colaborador->usuarioEmitente->imagem }}" alt="Image Description">
            @empty
                <div class="inline-block w-7 h-7 ms-auto rounded-full"></div>
            @endforelse
        </div>
    </div>
</div>
