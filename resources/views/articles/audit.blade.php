@extends('layout.layout')

@section('content')
    <div class="px-10">
        <div class="flex justify-end py-2">
            <a href="{{ route('articles.index') }}"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Lista de articulos
            </a>
        </div>
        @if ($article->changes->isEmpty())
            <p class="text-gray-600">No se encontraron cambios.</p>
        @else
            <ul class="divide-y divide-gray-200">
                @foreach ($article->changes as $change)
                    <li class="py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $change->created_at->diffForHumans() }} by <strong>{{ $change->user->name }}</strong>
                                </div>
                            </div>
                            <div class="ml-4 flex-shrink-0">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $change->action }}
                                </span>
                            </div>
                        </div>
                        <ul class="mt-2 space-y-2">
                            @foreach ($change->changes as $attribute => $values)
                                <li>
                                    <span class="text-gray-600">{{ ucfirst($attribute) }}:</span>
                                    <span class="text-gray-900">{{ $values['old'] }}</span>
                                    <span class="text-gray-500">➔</span>
                                    <span class="text-gray-900">{{ $values['new'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        @endif


    </div>
@endsection
