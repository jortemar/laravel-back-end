@extends('app')

@section('title', $thread->title)
@section('description', $thread->category->name)

@section('content')
    <div class="leading-loose max-w-4xl mb-4">
        {{ $thread->body }}
    </div>

    <div class="flex gap-2 text-xs text-gray-600">
        @foreach($thread->tags as $tag)
        <a href="{{ route('page.tag', $tag->slug) }}" class="flex items-center capitalize">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
            {{ $tag->name }}
        </a>
        @endforeach
    </div>

    <h2 class="flex items-center text-3xl my-8">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
        <span>
            {{ $thread->comments->count() }} Comentarios
        </span>
    </h2>

    @foreach($comments as $comment)
        <div class="max-w-3xl">
            <div class="flex items-center font-bold">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                {{ $comment->user->name }}
            </div>

            <div class="text-sm">
                {{ $comment->body }}
            </div>

            <hr class="my-4">
        </div>
    @endforeach
@endsection