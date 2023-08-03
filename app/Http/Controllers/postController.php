<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Post;

class postController extends Controller
{
    public function create()
    {
        $data = [
            'user' => auth()->user(),
        ];

        return view('post.create', $data);

    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image',
        ]);


        $imagepath = request('image')->store('uploads','public');

        $image= Image::make(public_path("storage/{$imagepath}"))->fit(1200,1200);
        $image->save();

        auth()->user()->posts()->create(
            ['caption'=>$data['caption'],
            'image'=> $imagepath]
        );


        return redirect('/profile/' .auth()->user()->id);

    }

    public function show(\App\Models\post $post)
    {
        return view('post.show',compact('post'));

    }

    public function index()
    {
        if (auth()->check() && auth()->user()->following) {
            $users = auth()->User()->following->pluck('user_id');
            $posts=post::whereIn('user_id',$users)->with('user')->latest()->paginate(2);
            return view('post.index',compact('posts'));
        }

        else
        return view('post.index');



    }

}
