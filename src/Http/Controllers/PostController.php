<?php

namespace MTR\PostPackage\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MTR\PostPackage\Facades\FilterPost;
use MTR\PostPackage\Models\Post;

class PostController extends Controller 
{
    public function index()
    {
        $post  = Post::all();
        return view('postpackage::posts.index',compact('post'));
    }

    public function create()
    {
        return view('postpackage::posts.create');
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $all_data = $request->all();

            $all_data['author_id'] = rand(1,10);
            Post::create($all_data);
            DB::commit();
            return back()->with('success','succes create post')->withInput();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;

        }
        
    }

    public function show(Request $request,$id)
    {
        $post = Post::find($id);
        return view('postpackage::posts.show',compact('post'));
    }

    public function update(Request $request,$id)
    {
        try {
            DB::beginTransaction();
            $post = Post::find($id);
            $post->update($request->all());
            DB::commit();
            return back()->with('success','success update Post');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function search($key)
    {
        $post = FilterPost::withTitle($key);
        // $post = new FilterPost();
        // $post = $post->withTitle($key);
        return response()->json($post);
    }
}
