<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto p-4">
        <h1 class="mb-8 text-gray-300">{{ $post->title }}</h1>
        <p class="leading-loose text-lg text-gray-500">
            {{ $post->body }}
        </p>
        <small class="text-gray-500"> &ndash; {{ $post->user->name }} </small>
        <small class="text-gray-500"> {{ $post->created_at->format('d M Y') }} </small>
    </div>
</x-app-layout>
