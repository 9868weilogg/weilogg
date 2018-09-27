<?php

namespace App\Http\Controllers\weilogg;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\weilogg\Blog;
use Illuminate\support\facades\Response;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
        return Blog::orderBy('created_at','desc')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->blog_title = $request->new_title;
        $blog->blog_post = $request->new_post;
        $blog->save();

        return response($blog->jsonSerialize(),201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return Blog::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        Blog::where('id',$id)->update([
        	'blog_title' => $request->update_title,
        	'blog_post' => $request->update_post,
        ]);

        return response(null,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Blog::destroy($id);

        return response(null,200);
    }

    /**
     * Show the blog view.
     *
     * @param  int  $id
     * @return Response
     */
    public function show_blog()
    {
        

        return view('blog');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update_blog(Request $request,$id)
    {
        Blog::where('id',$id)->update([
        	'blog_title' => $request->update_title,
        	'blog_post' => $request->update_post,
        ]);

        return response(null,200);
    }
}
