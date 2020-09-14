<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;
// use App\Profile;
// use \Auth;

class ProfilesController extends Controller
{
    // public function __construct(){

    //     $this->middleware('auth');
    // }
    

    public function index($user){
        // dd($user);
        // $user = auth()->user()->id;

        // $id = \Auth::id();
        // $user = User::findOrFail(auth()->id());
        // $imagePath = ($this->image) 
        // ? $this->image:'profile/mHJkSIqoHvz4SGNeB9I3bVVUWeBYn5iQqG43L462.png';
  
        // $follows = (auth()->user()) ? auth()->user()->following->contains($user):false;
        $follows = (auth()->user()) ? auth()->user()->following->contains($user):false;
        // dd($follows);
        // dd($follows);
        // return view('profiles.index',compact('user','follows'));
        $userObj = User::find($user);
        return view('profiles.index',['user' => $userObj, 'follows' => $follows]);


        // return view('profiles.index',[
        //     'user' => $user,
        // ]);
    }

    // public function getUser(Request $request){

    //     return view('profiles.index',compact('user'));
    // }
        
    public function edit(User $user){

        // $id = \Auth::id();
        // $user = User::findOrFail($id);
        
        
        return view('profiles.edit',compact('user'));
    }
    public function update(User $user){

        // $id = \Auth::id();
        // $user = User::findOrFail($id);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

      
        if(request('image')){
            
            $imagePath = request('image')->store('profile','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imagearray = ['image' => $imagePath];

        }

       
        $user->profile->update(array_merge(
            $data,
            $imagearray ?? []
        ));
        // dd($data);
        // return view('profiles.index',compact('user'));
        return redirect()->action('ProfilesController@index',compact('user'));

    }
}
