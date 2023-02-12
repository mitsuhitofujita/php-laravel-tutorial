<?php

namespace App\Http\Controllers\Post;

use Inertia\Inertia;
use App\Http\Requests\Post\PostCreateRequest;
use App\Http\Requests\Post\PostEditRequest;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Http\Requests\Post\PostDestroyRequest;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Response;
use Inertia\Response as InertiaResponse;

class PostController extends Controller
{
    public function index(Post $post): InertiaResponse
    {
        return Inertia::render('Post/Index', ['posts' => $post->all()]);
    }

    public function create(): InertiaResponse
    {
        return Inertia::render('Post/Create', ['post' => ['payload' => '']]);
    }

    public function store(PostCreateRequest $request, Post $post): Response
    {
        $post->fill([
            'user_id' => $request->getUserId(),
            'payload' => $request->getPayload(),
        ])->save();
        return response('', Response::HTTP_CREATED);
    }

    public function edit(PostEditRequest $request, Post $post): InertiaResponse
    {
        return Inertia::render('Post/Edit', ['post' => $post->find($request->getId())]);
    }

    public function update(PostUpdateRequest $request, Post $post): Response
    {
        $post->find($request->getId())->fill(['payload' => $request->getPayload()])->save();
        return response('', Response::HTTP_NO_CONTENT);
    }

    public function destroy(PostDestroyRequest $request, Post $post): Response
    {
        $post->destroy($request->getId());
        return response('', Response::HTTP_NO_CONTENT);
    }
}
