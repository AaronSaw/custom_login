<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SocialController extends Controller
{
    public function index(){
   $socials=Social::all();
   return view('social',compact('socials'));
    }
   public function githubRedirect(){
    return Socialite::driver('github')->redirect();
   }

   public function githubCallback(){
    $githubUser = Socialite::driver('github')->user();
    $social = Social::where('social_id','=', $githubUser->id)->first();
    if($social){
        return redirect()->route('socialIndex');
    }else{
    $user = Social::create([
                    'social_id'=>$githubUser->id,
                    'name'=>$githubUser->nickname,
                    'email'=>$githubUser->email,
                    'password'=>encrypt('Saw@777'),
                    'profile'=>$githubUser->avatar,
                ]);}

 return redirect()->route('socialIndex');
 //$social = Social::where('social_id', $githubUser->id)->first();
//
//    if ($user) {
//        $user->update([
//            'email' => $githubUser->email,
//            'password'=>encrypt('Saw@777'),
//        ]);
//    } else {
//        $user = Social::create([
//            'social_id'=>$githubUser->id,
//            'name'=>$githubUser->nickname,
//            'email'=>$githubUser->email,
//            'password'=>encrypt('Saw@777'),
//            'profile'=>$githubUser->avator,
//        ]);
//    }
//    //Auth::login(['email' => $githubUser->email, 'password' => $githubUser->password]);
    //return redirect()->route('dashboard');
   }

   public function googleRedirect(){
    return Socialite::driver('google')->redirect();
   }
   public function googleCallback(){
    $googleUser = Socialite::driver('google')->user();
    //dd($googleUser);
    $social = Social::where('social_id','=', $googleUser->id)->first();
    if($social){
        return redirect()->route('socialIndex');
    }else{
    $user = Social::create([
                    'social_id'=>$googleUser->id,
                    'name'=>$googleUser->name,
                    'email'=>$googleUser->email,
                    'password'=>encrypt('Saw@777'),
                    'profile'=>$googleUser->avatar,
                ]);}

 return redirect()->route('socialIndex');
   }
}
