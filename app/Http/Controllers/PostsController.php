<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Intervention\Image\Facades\Image;
class PostsController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }
    public function index(){

        // $follows = (auth()->user()) ? auth()->user()->following->contains($user->id):false;
        
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id',$users)->latest()->paginate(5);

        $allusers = User::where('id', '!=', auth()->user()->id)->get();
        // dd($allusers);
        // dd($posts);
        $user = auth()->user();
        return view('posts.index',compact('posts','user','allusers'));
    }

    public function create(){

        // $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
        return view('posts.create'); 
    }
    
   
    public function store(User $user){
        
        // $user = auth()->user();
        // dd($user);
        $data = request()->validate([
            'caption' => 'required',
            'image'  =>['required', 'image']
        ]);
        
        
         $imagePath = request('image')->store('uploads','public');
         $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
         
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
            ]);
            return redirect()->action('ProfilesController@index',compact('user'));
    }
    public function show(\App\Post $post){

        // $user = auth()->user();
        // dd($user);
        return view('posts.show',compact('post',));
    }

}
