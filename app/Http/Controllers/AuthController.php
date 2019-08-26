<?php

namespace App\Http\Controllers;


use App\User;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuthExceptions\JWTException;
use Tymon\JWTAuthExceptions\TokenExpiredException;
use Tymon\JWTAuthExceptions\TokenInvalidException;




class AuthController extends Controller
{

     /**
     * @var TymonJWTAuthJWTAuth
     */
    protected $jwt;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }

    public function signup(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required|unique:users',
            'school_id' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        if ($validator->fails()) {
              return response()->json(['message' => 'error', 'data' => $validator->messages()]);
        }


        $create = User::create([
             'username' => $request->username,
             'name' => $request->name,
             'email' => $request->email,
             'password' =>   Hash::make($request->password),
             'remember_token'   => str_random(20),
             'school_id'   => $request->school_id
            ]);
        return $create;

    }

    public function signin(Request $request){
        $this->validate($request, [
            'email'    => 'required|email|max:255',
            'password' => 'required',
        ]);

        try {
            // if (! $token = Auth::attempt($request->only('email', 'password'))) {
            //     return response()->json(['user_not_found'], 404);
            // }
            // die($token);
            $user = User::where('email',  $request->email)->orWhere('username', $request->email )->first();
            if($user !== null){
                if (Hash::check($request->password,$user->password)) {
                    if($user->status == 0 ){
                          return response()->json(["message" => "success", "data" => 'akun belum aktif'], 200);
                    }
                    $token = $this->jwt->fromUser($user);
                }else{
                     return response()->json(["message" => "success", "data" =>  'password tidak cocok'], 200);
                }
            }else{
                 return response()->json(["message" => "success", "data" =>  'email belum terdaftar'], 200);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (JWTException $e) {
            return response()->json(['token_absent' => $e->getMessage()], $e->getStatusCode());
        }

       return $this->respondWithToken($token);
    }

     /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile(){
        return response()->json(Auth::user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(){
        Auth::logout();

        return response()->json(['message' => 'success', "data" => "Berhasil Keluar, Silahkan login kembali"]);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh(){
        return $this->respondWithToken(Auth::refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->jwt->factory()->getTTL() * 60
        ]);
    }

    public function changePassword(Request $request){
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        if ($validator->fails()) {
              return response()->json(['message' => 'error', 'data' => $validator->messages()]);
        }

        if (Hash::check($request->current_password,Auth::user()->password)) {
            $update = Auth::user()->update([
                "password" =>  app('hash')->make($request->password),
            ]);

            if($update){
                return response()->json([
                    "message" => "success", 
                    "data" => "Password anda telah berhasil diganti"], 200);
            }

            return response()->json(['message' => 'error', 'data' => 'gagal update']);
        }else{
            return response()->json(['message' => 'error', 'data' => 'current password tidak cocok']);
        }

    }

    public function update(Request $request){
       $validator = Validator::make($request->all(), [
            'username' => 'required',
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
              return response()->json(['message' => 'error', 'data' => $validator->messages()]);
        }

        if(Auth::user()->isAdmin()){
            $cek = User::where('id', $request->id)->first();
            $cek->status = $request->status;
        }else{
            $cek = User::where('id', Auth::user()->id)->first();
        }


        $cek->username = $request->username;
        $cek->name = $request->name;
        $cek->email = $request->email;  
        $update = $cek->save();

        if($update ){
            return response()->json([
                "message" => "success", 
                "data" => $cek], 200);
        }

        return response()->json(['message' => 'error', 'data' => 'User ID not found']);
    }

    public function show(){
        $data = User::all();
          return response()->json([
                "message" => "success", 
                "data" => $data], 200);     
    }

    
}
