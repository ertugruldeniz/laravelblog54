<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Session ;

class PostController extends Controller
{

    public function index()
    {
        $posts=Post::orderBy('id','DESC')->paginate(10);
        return view('posts.index')->withPosts($posts);
    }

    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        //validate the data

        $this->validate($request,array(
            'title'=>'required|max:255',
            'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug', //zorunlu alan -altçizgi içerebilir-daha önece alınmamış bir slug
            'body'=>'required'

        ));

        $post=new Post;

        $post->title=$request->title;
        $post->body=$request->body;
        $post->slug=$request->slug;
        $post->save();

        Session::flash('success','The blog post was successfuly save!');

        return redirect()->route('posts.show',$post->id);
    }


    public function show($id)
    {

        $post=Post::find($id);
        return view('posts.show')->with('post',$post);
    }


    public function edit($id)
    {
        $post=Post::find($id);
        return view('posts.edit')->withPost($post);
    }



    public function update(Request $request, $id)
    {
       $post=Post::find($id);
       if ($request->input('slug')==$post->slug){

           $this->validate($request,array(
               'title'=>'required|max:255',
               'slug'=>'required|alpha_dash|min:5|max:255',
               'body'=>'required'
           ));


       }else{

           $this->validate($request,array(
               'title'=>'required|max:255',
               'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
               'body'=>'required'
           ));

       }
        $post=Post::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->slug=$request->input('slug');
        $post->save();
        Session::flash('success','İçerikler Başarı ile Kaydedildi.');
        return redirect()->route('posts.show',$post->id);

    }



    public function destroy($id)
    {
        $post=Post::find($id);

        $post->delete();

        Session::flash('success','İçerikler başarı ile silindi.');

        return redirect()->route('posts.index');
    }
}
