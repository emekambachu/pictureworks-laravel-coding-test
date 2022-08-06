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
    public function index(){
        return view('index');
    }

    public function allUsers(){
        try{
            $users = UserService::userWithRelationships()->orderBy('name')->get();
            return response()->json([
                'success' => true,
                'users' => $users,
            ]);

        }catch (\Exception $error){
            return $error->getMessage();
        }
    }

    public function show($id){
        try{
            $user = UserService::user()->findOrFail($id);
            return view('show', compact('user'));

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
            UserService::addCommentsToUser($request, $id);
        } catch (Exception $e) {
            BaseService::errorExceptions($e);
        }

        return response()->json([
            'success' => true,
        ]);
    }
}
