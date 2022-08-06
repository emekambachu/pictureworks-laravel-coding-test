<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class UserService.
 */
class UserService
{
    public static function user(){
        return new User();
    }

    public static function userWithRelationships(){
        return self::user()->with('comments');
    }

    public static function comment(){
        return new Comment();
    }

    public static function commentsFromUserId($id){
        $user = self::userWithRelationships()->where('id', $id)->first();
        if (!$user) {
            throw new ModelNotFoundException('User not found by ID ' . $id);
        }
        return $user;
    }

    public static function addCommentsToUser($request, $id){
        self::comment()->create([
            'user_id' => $id,
            'comment' => $request->comment
        ]);
    }
}
