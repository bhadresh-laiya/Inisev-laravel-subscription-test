<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SubscriberController extends Controller
{
    public function getSubscribe(Request $request){
        if($request->user){
            $user = User::find($request->user);
            if(!empty($user)){
                $user->is_subscribe = $request->subscriber;
                $user->save();
                if($request->subscriber == 1){
                    //subscribe
                    return response()->json(['message'=>'Your subscribe has been successful.']);
                } else {
                    //unsubscribe
                    return response()->json(['message'=>'You have been Unsubscribe successfully from website.']);
                };
            } else {
                //user not found
                return response()->json(['message'=>'User not found.']);
            }
        } else {
            //user id missing in request
            return response()->json(['message'=>'User missing.']);
        }
    }
}
