<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Thread;
use App\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index(User $user)
    {


       $comments=Comment::where('user_id',$user->id)->where('commentable_type','App\Comment')->get();

       return view('profile.index',compact('comments','user'));
       
    }
}
