<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
// use App\Post;


class FollowsController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }
    public function store(User $user){
        
        //  $id = \Auth::id();
        // $user = User::findOrFail($id);

        return auth()->user()->following()->toggle($user->profile);
    }
}
