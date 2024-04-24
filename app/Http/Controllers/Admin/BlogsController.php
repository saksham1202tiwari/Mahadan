<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Blog;
use App\Http\Requests\BlogRequest;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BlogRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BlogRequest $request)
    {
        $blog = new Blog;
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');

        if (auth()->user()->user_type == 1) {
            $blog->user_id = $request->input('user_id');
            $blog->approved = $request->input('approved') == 'on' ? 1 : 0;
        } else {
            $blog->user_id = auth()->id();
        }
        $blog->save();

        if ($request->has('image') && $request->image !== null) {
            $blog->addMedia($request->image)->toMediaCollection();
        }

        return to_route('admin.blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.show', ['blog' => $blog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BlogRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BlogRequest $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');

        if (auth()->user()->user_type == 1) {
            $blog->user_id = $request->input('user_id');
            $blog->approved = $request->input('approved') == 'on' ? 1 : 0;
        } else {
            $blog->user_id = auth()->id();
        }
        $blog->save();

        if ($request->has('image') && $request->image !== null) {
            $blog->clearMediaCollection();
            $blog->addMedia($request->image)->toMediaCollection();
        }

        return to_route('admin.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return to_route('admin.blogs.index');
    }
}
