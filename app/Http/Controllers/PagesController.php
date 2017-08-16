<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex(){

        $posts=Post::orderBy('created_at','DESC')->limit(4)->get();
        return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout(){

        $first="Cihan";
        $last="Deniz";
        $full=$first." ".$last;
        $email="ertugruldeniz@outloook.com.tr";
       /*  return view ('pages.about')->withFull($full)->withEmail($email); BU ŞEKİLDE DE KULLANIOLIYOR UNUTMA */
       //ikinci yol
        $data=[];
        $data['email']=$email;
        $data['fullname']=$full;

        return view('pages.about')->withData($data);

    }

    public function getContact(){
        return view('pages.contact');
    }



}
