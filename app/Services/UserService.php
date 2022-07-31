<?php

namespace App\Services;

use App\Models\User;

/**
 * Class UserService.
 */
class UserService
{
    public static function user(){
        return new User();
    }

    public static function commentsFromUserId($id){
        return self::user()->where('id', $id)->first();
    }

    public static function appendCommentsToUser($id, $request){
        $user = self::user()->where('id', $id)->first();

        $commentsFromUser = '';
        if(!empty($user->comments)){
            $commentsFromUser = explode(", ", $user->comments);
            $commentsFromUser[] = $request->comment;
        }

    }
}
