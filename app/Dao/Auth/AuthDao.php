<?php

namespace App\Dao\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Contracts\Dao\Auth\AuthDaoInterface;
use Illuminate\Support\Arr;
use Symfony\Component\HttpKernel\Profiler\Profile;

/**
 * Data accessing oobject for post
 */
class AuthDao implements AuthDaoInterface
{
    /**
     * To store post
     * @param request
     * @return object
     */
    public function storePost($request)
    {
        if($request->hasFile('profile')){
            //dd('hla');
            $newName = uniqid() . "_image." . $request->file('profile')->extension();
            $request->file('profile')->storeAs('public',$newName);
        }else{
            $newName="people.png";
        }
        $data = array(
            'profile'=>$newName,
            'name'=>$request->name,
             'email' => $request->email,
            'password'  => Hash::make($request->password),
            'address' =>$request->address,
        );
        $input = User::create($data);
        return $input;
    }

    /**
     * To create post
     * @param request
     * @return input_data
     */
    public function createPost($request)
    {
        // check if it is email
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        $credentials = $request->only('email', 'password');
        $input_data = Auth::attempt($credentials);
        return $input_data;
    }

    /**
     * To logout post
     * @return logout
     */
    public function logoutPost()
    {
        $logout = Auth::logout();
        return $logout;
    }

    /**
     * To updatePasswordPost
     * @param request
     * @return data
     */
    public function updatePasswordPost($request)
    {
        $data = User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        return $data;
    }

    /**
     * request data
     * @param request
     * @return Array
     */
    private function data($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
        ];
    }
}
