<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;

// use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
// use App\User; 
// use Illuminate\Support\Facades\Auth; 
use Validator;

class AuthController extends Controller
{
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */

    public $successStatus = 200;

    public function signup(Request $request)
    {
        // $request->validate([
        //     'firstname' => 'required|string|max:255',
        //     'secondname' => 'required|string|max:255',
        //     'type' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:6|confirmed',
        //     'address' => 'required|string|max:255',
        //     'mobileno' => 'required|string|max:255',
        // ]);
        // $user = new User([
        //     'firstname' => $request->firstname,
        //     'secondname' => $request->secondname,
        //     'type' => $request->type,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        //     'address'=> $request->address,
        //     'mobileno' => $request->mobileno
        // ]);
        // $user->save();
        // return response()->json([
        //     'message' => 'Successfully created user!'
        // ], 201);

        $validator = Validator::make($request->all(), [ 
                  'firstname' => 'required|string|max:255',
            'secondname' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            // 'password' => 'required|string|min:6|confirmed',
            'address' => 'required|string|max:255',
            'mobileno' => 'required|string|max:255',
            // 'name' => 'required', 
            // 'email' => 'required|email', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);
    if ($validator->fails()) { 
        return response()->json(['error'=>$validator->errors()], 401);            
    }
    
    $input = $request->all(); 
    $input['password'] = bcrypt($input['password']); 
    $user = User::create($input); 
    $success['token'] =  $user->createToken('MyApp')-> accessToken; 
    $success['name'] =  $user->name;
    return response()->json(['success'=>$success], $this-> successStatus); 
    }
  
    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|string|email',
        //     'password' => 'required|string',
        //     'remember_me' => 'boolean'
        // ]);
        // $credentials = request(['email', 'password']);
        // if(!Auth::attempt($credentials))
        //     return response()->json([
        //         'message' => 'Unauthorized'
        //     ], 401);
        // $user = $request->user();
        // $tokenResult = $user->createToken('Personal Access Token');
        // $token = $tokenResult->token;
        // if ($request->remember_me)
        //     $token->expires_at = Carbon::now()->addWeeks(1);
        // $token->save();
        // return response()->json([
        //     'access_token' => $tokenResult->accessToken,
        //     'token_type' => 'Bearer',
        //     'expires_at' => Carbon::parse(
        //         $tokenResult->token->expires_at
        //     )->toDateTimeString()
        // ]);
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            if ($user->verified==1) {
                $success['token'] =  $user->createToken('MyApp')-> accessToken; 
                return response()->json(['success' => $success], $this-> successStatus);
            }else{
                return response()->json(['error'=>'Unauthorised'], 401);
            }
                
             
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
  
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
  
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus); 
    } 
}