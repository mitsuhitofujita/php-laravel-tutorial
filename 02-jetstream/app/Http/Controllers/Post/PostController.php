<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\Post\PostCreateRequest;
use App\Http\Requests\Post\PostEditRequest;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Http\Requests\Post\PostDestroyRequest;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        return Inertia::render('Post/Index', ['posts' => $post->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Post/Create', ['post' => ['payload' => '']]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request, Post $post)
    {
        $post->fill([
            'user_id' => $request->getUserId(),
            'payload' => $request->getPayload(),
        ])->save();
        return response('', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PostEditRequest $request, Post $post)
    {
        return Inertia::render('Post/Edit', ['post' => $post->find($request->getId())]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $post->find($request->getId())->fill(['payload' => $request->getPayload()])->save();
        return response('', Response::HTTP_NO_CONTENT);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostDestroyRequest $request, Post $post)
    {
        $post->destroy($request->getId());
    }
}
