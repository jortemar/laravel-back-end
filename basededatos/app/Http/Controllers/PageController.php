<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Thread;

class PageController extends Controller
{
    public function home() {
        $title = 'Preguntas y respuestas';
        $description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, eligendi at. Nulla, vitae voluptatibus dolore consequatur dolorem deleniti modi autem delectus harum praesentium libero culpa labore, facere aspernatur explicabo officiis?';

        $threads = Thread::orderBy('id', 'DESC')
            ->with('category', 'tags', 'user')
            ->withCount('comments')
            ->paginate();

        return view('list', compact('title', 'description', 'threads'));
    }

    public function category(Category $category) {
        $title = "Categoría: $category->name";
        $description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, eligendi at. Nulla, vitae voluptatibus dolore consequatur dolorem deleniti modi autem delectus harum praesentium libero culpa labore, facere aspernatur explicabo officiis?';

        $threads = $category
            ->threads()
            ->orderBy('id', 'DESC')
            ->with('category', 'tags', 'user')
            ->withCount('comments')
            ->paginate();

        return view('list', compact('title', 'description', 'category', 'threads'));
    }

    public function tag(Tag $tag) {

        $title = "Etiqueta: $tag->name";
        $description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, eligendi at. Nulla, vitae voluptatibus dolore consequatur dolorem deleniti modi autem delectus harum praesentium libero culpa labore, facere aspernatur explicabo officiis?';

        $threads = $tag
            ->threads()
            ->orderBy('id', 'DESC')
            ->with('category', 'tags', 'user')
            ->withCount('comments')
            ->paginate();

        return view('list', compact('title', 'description', 'tag', 'threads'));
    }

    public function thread(Thread $thread) {

        $comments = $thread
            ->comments()
            ->orderBy('id', 'DESC')
            ->with('user')
            ->get();

        return view('thread', compact('thread', 'comments'));
    } 
}
