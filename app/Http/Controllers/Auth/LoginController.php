<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $user= User::where('email', $fields["email"])->firstOrFail();
        if ($user || Hash::check($fields["password"], $user->password)) {
        $token= $user->createToken("mytoken");
            return response()->json([
                "message" => "success",
                "status"=>200,
                "token"=>$token->plainTextToken,

                
                
            ]);
        }
    }
    public function logout(Request $request)
    {
   auth()->user(tokens)->delete();
            return response()->json([
                "message" => "success",
                "status"=>200,        
                ]);
        }
   
}
