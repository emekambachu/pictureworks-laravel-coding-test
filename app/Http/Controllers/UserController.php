<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userComments($id){
        try{
            $user = UserService::commentsFromUserId($id);
            return view('home', compact('user'));

        }catch (\Exception $error){
            return $error->getMessage();
        }
    }
}
