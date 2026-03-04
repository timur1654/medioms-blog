<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Repositories\Intarfaces\PostRepositoryInterface;
use App\Services\Interfaces\PostServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Js;

class PostController extends Controller
{
    public function __construct(
        private PostServiceInterface $postService
    )
    {}

    public function index():JsonResponse
    {
        return response()->json($this->postService->getAllApi());
    }

    public function show(int $id):JsonResponse
    {
        $post = $this->postService->getByIdApi($id);

        if (!$post) return response()->json(['message' => 'Not Found', 404]);

        return response()->json($post);
    }

    public function store(StorePostRequest $request):JsonResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        return response()->json($this->postService->createApi($data), 201);
    }

    public function update(UpdatePostRequest $request, int  $id):JsonResponse
    {
        $post = $this->postService->updateApi($id, $request->validated());

        if (!$post) return response()->json(['message' => 'Not found', 404]);

        return response()->json($post);
    }

    public function destroy(int $id):JsonResponse
    {
        $post = $this->postService->deleteApi($id);

        if (!$post) return response()->json(['message' => 'Not found', 404]);

        return response()->json(['message' => 'Deleted']);
    }
}
