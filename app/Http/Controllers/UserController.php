<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitUserCommentRequest;
use App\Models\User;
use App\Services\BaseService;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($id){
        try{
            $user = UserService::commentsFromUserId($id);
            return view('home', compact('user'));

        }catch (\Exception $error){
            return $error->getMessage();
        }
    }

    public function getUserComments($id){
        try {
            $user = UserService::commentsFromUserId($id);
            return response()->json([
                'success' => true,
                'user' => $user,
            ]);

        } catch (Exception $e) {
            BaseService::errorExceptions($e);
        }
    }

    public function addUserComment(SubmitUserCommentRequest $request, $id){
        try {
            UserService::appendCommentsToUser($request, $id);
        } catch (Exception $e) {
            BaseService::errorExceptions($e);
        }

        return response()->json([
            'success' => true,
        ]);
    }
}
