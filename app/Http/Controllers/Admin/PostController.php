<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Post;
use App\Category;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = 'Posts';
        if( Auth::user()->type === 1 || Auth::user()->hasRole('Editor')) {
            $data = Post::with(['creator'])->orderBy('id','desc')->get();
        } else {
            $data = Post::with(['creator'])->where('created_by', Auth::user()->id)->orderBy('id', 'desc')->get();
        }

        $top_viewed = Post::max('view_count');

        return view('admin.post.list', compact('page_name', 'data', 'top_viewed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = 'Post Create';
        $categories = Category::where('status', 1)->select('name', 'id')->get();

        return view('admin.post.create', compact('page_name', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->slug = str_slug($request->title,'-');
        $post->short_description = $request->short_description;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->status = 1;
        $post->hot_news = 0;
        $post->view_count = 0;
        $post->main_image = '';
        $post->thumb_image = '';
        $post->list_image = '';
        $post->created_by = Auth::id();
        $post->save();
        
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $main_image = 'post_main'.$post->id.'.'.$extension;
        $thumb_image = 'post_thumb'.$post->id.'.'.$extension;
        $list_image = 'post_list'.$post->id.'.'.$extension;

        Image::make($file)->resize(650, 569)->save(public_path('/storage/post/'.$main_image));
        Image::make($file)->resize(360, 309)->save(public_path('/storage/post/'.$list_image));
        Image::make($file)->resize(122, 122)->save(public_path('/storage/post/'.$thumb_image));

        $post->main_image = $main_image;
        $post->thumb_image = $thumb_image;
        $post->list_image = $list_image;

        $post->save();

        return redirect()->action('Admin\PostController@index')->with('success', 'Post Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = "Post Edit";
        $post = Post::find($id);
        $categories = Category::where('status', 1)->select('name', 'id')->get();

        return view('admin.post.edit', compact('page_name', 'post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'short_description' => 'required',
            'description' => 'required',
        ]);

        $post = Post::find($id);
        if($request->file('image')){
            @unlink(public_path('/post/'.$post->$main_image));
            @unlink(public_path('/post/'.$post->$thumb_image));
            @unlink(public_path('/post/'.$post->$list_image));
            
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $main_image = 'post_main'.$post->id.'.'.$extension;
            $thumb_image = 'post_thumb'.$post->id.'.'.$extension;
            $list_image = 'post_list'.$post->id.'.'.$extension;

            Image::make($file)->resize(650, 569)->save(public_path('/storage/post/'.$main_image));
            Image::make($file)->resize(360, 309)->save(public_path('/storage/post/'.$list_image));
            Image::make($file)->resize(122, 122)->save(public_path('/storage/post/'.$thumb_image));

            $post->main_image = $main_image;
            $post->thumb_image = $thumb_image;
            $post->list_image = $list_image;
        }

        $post->title = $request->title;
        $post->slug = str_slug($request->title,'-');
        $post->short_description = $request->short_description;
        $post->description = $request->description;
        $post->category_id = $request->category_id;

        $post->save();

        return redirect()->action('Admin\PostController@index')->with('success', 'Post Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        @unlink(public_path('/post/'.$post->$main_image));
        @unlink(public_path('/post/'.$post->$thumb_image));
        @unlink(public_path('/post/'.$post->$list_image));

        $post->delete();

        return redirect()->action('Admin\PostController@index')->with('success', 'Post Deleted Successfully');

    }

    /**
     * Make Status the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $post = Post::find($id);
        if($post->status === 1) {
            $post->status = 0;
        } else {
            $post->status = 1;
        }
        $post->save();

        return redirect()->action('Admin\PostController@index')->with('success', 'Post Status Changed Successfully');

    }
    public function hot_news($id)
    {
        $post = Post::find($id);
        if($post->hot_news === 1) {
            $post->hot_news = 0;
        } else {
            $post->hot_news = 1;
        }
        $post->save();

        return redirect()->action('Admin\PostController@index')->with('success', 'Post Hot Status Changed Successfully');

    }
}
