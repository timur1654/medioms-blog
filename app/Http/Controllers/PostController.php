<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repositories\Intarfaces\PostRepositoryInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(
        private PostRepositoryInterface $posts
    )
    {
    }

    public function index(Request $request)
    {
        $posts = $this->posts->getPublishedPaginated($request->get('q'), 4);

        return view('posts.index', compact('posts'));
    }

    public function show(string $slug)
    {
        $post = $this->posts->findPublishedBySlugOrFail($slug);
        return view('posts.show', compact('post'));
    }
}
