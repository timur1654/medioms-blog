<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Repositories\Intarfaces\PostRepositoryInterface;
use App\Service\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct(
        private PostService $service,
        private PostRepositoryInterface $repository
    )
    {
    }

    public function index()
    {
        $posts = $this->repository->getPaginated(4);
        return view('admin.posts.index', compact('posts'));
    }


    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StorePostRequest $request)
    {
        $this->service->create($request->validated());

        return redirect()->route('admin.posts.index')->with('success', 'Пост успешно создан!');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->service->update($post, $request->validated());

        return redirect()->route('admin.posts.index')->with('success', 'Пост успешно обновлён!');
    }

    public function destroy(Post $post)
    {
        $this->service->delete($post);

        return redirect()->route('admin.posts.index')->with('success', 'Пост успешно удалён!');
    }
}
