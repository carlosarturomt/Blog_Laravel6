<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @foreach ($posts as $post)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-2">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-2">
                    <h5 class="text-white">{{ $post->title }}</h5>
                    <p class="text-gray-400">
                        {{ $post->get_excerpt }}
                        <a class="text-white" href="{{ route('post', $post) }}">Leer más</a>
                    </p>
                    <small class="text-gray-500"> &ndash; {{ $post->user->name }} </small>
                    <small class="text-gray-500"> {{ $post->created_at->format('d M Y') }} </small>
                </div>
            </div>
        @endforeach
    </div>
    <div class="dark:bg-gray-800 ">
        {{ $posts->links() }}
    </div>
</x-app-layout>
