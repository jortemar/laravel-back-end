<div class="rounded shadow mb-4 p-4 max-w-4xl hover:bg-gray-200">
    <h2 class="text-2xl mb-4">{{ $thread->title }}</h2>

    <div class="text-xs text-gray-600 flex items-center justify-between">
        <div class="flex gap-4">
            <a href="{{ route('page.category', $thread->category->slug) }}" class="flex items-center uppercase">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                {{ $thread->category->name }}
            </a>

            <span class="flex gap-2">
                @foreach($thread->tags as $tag)
                <a href="{{ route('page.tag', $tag->slug) }}" class="flex items-center capitalize">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                    {{ $tag->name }}
                </a>
                @endforeach
            </span>
        </div>

        <div class="flex gap-4">
            <span class="flex items-center">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                {{ $thread->user->name }}
            </span>
            <span class="flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                <span>
                    {{ $thread->comments_count }} Comentarios
                </span>
            </span>

            <a href="{{ route('page.thread', $thread->slug) }}" class="text-indigo-600">Ver &rarr;</a>
        </div>
    </div>
</div>