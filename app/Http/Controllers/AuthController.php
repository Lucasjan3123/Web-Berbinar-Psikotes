<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\ResponseWithTokenResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\userDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;
class AuthController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    // Register
    public function register(RegisterRequest $request)
    {
        try{
            $validatedData = $request->validated();
            $password = $validatedData['password'];

             // Check if the email is already registered
            $existingUser = User::where('email', $validatedData['email'])->first();
            if ($existingUser) {
                return $this->sendResponse('', 'Email is already registered.');
            }


            if (strlen($password) < 8) {
                return $this->sendResponse( '','Password must be at least 8 characters long.');
            }
    
            if (!preg_match('/[A-Z]/', $password)) {
                return $this->sendResponse( '','Password must contain at least one uppercase letter.', '');
            }
    
            if (!preg_match('/[a-z]/', $password)) {
                return $this->sendResponse('','Password must contain at least one lowercase letter.','');
            }
    
            if (!preg_match('/[0-9]/', $password)) {
                return $this->sendResponse( '','Password must contain at least one number.', '');
            }
    

            $user = new User([
                'role_id' => 3,
                'full_name' => $validatedData['full_name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
            ]);
    
            $user->save();
            
            
            $userDetail = new userDetail([
                'user_id' => $user->id,
                'address' => $validatedData['address'],
                'phone_number' => $validatedData['phone_number'],
                'profile_picture' => $validatedData['profile_picture'],
            ]);
    
            $userDetail->save();    
            
            $user->user_id = $userDetail->user_id;
            $user->address = $userDetail->address;
            $user->phone_number = $userDetail->phone_number;
            $user->profile_picture = $userDetail->profile_picture;

            $userResource = new UserResource($user);
            return $this->sendResponse($userResource, 'Successfully Regstered!');
           
        }catch(\Exception $e){
            return  $this->sendError('Registration failed', $e->getMessage());
        }

    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    //   Login
    public function login(UserRequest $request)
    {
        $validate = $request->validated();
        try {
            if (!$user = User::where('email', $validate['email'])->first()) {
                return $this->sendResponse('','User not found');
            }
    
            if (!Hash::check($validate['password'], $user->password)) {
                return $this->sendResponse('','error : Invalid Password');
            }
    
            if (! $token = auth()->attempt($validate)) {
                return $this->sendResponse('','Unauthorized');
            }
    
            return $this->respondWithToken($token);   


        } catch (\Exception $e) {
            return $this->sendError('Could not create token',$e->getMessage());
        }
        
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    //  Detail user
    public function me()
    {
        return $this->sendResponse(auth()->user(),'succesfully');
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */

    //  Logout
    public function logout()
    {
        auth()->logout();

        return $this->sendResponse('','Successfully logged out');
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    //  refresh
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return $this->sendResponseWithToken($token, 'Successfully !');
   

    }
}