<?php

namespace App\Services;

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

    public static function commentsFromUserId($id){
        $user = self::user()->where('id', $id)->first();
        if (!$user) {
            throw new ModelNotFoundException('User not found by ID ' . $id);
        }
        return $user;
    }

    public static function appendCommentsToUser($request, $id){
        $user = self::user()->findOrFail($id);
        $user->update([
            'comments' => $user->comments.'|'.$request->comments
        ]);
    }
}
