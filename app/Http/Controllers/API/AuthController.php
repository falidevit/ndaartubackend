<?php

namespace NdaartuAPI\Http\Controllers;
namespace NdaartuAPI\Http\Controllers\API;

use NdaartuAPI\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    private function getToken($email, $password)
    {
        $token = null;
        //$credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt(['email' => $email, 'password' => $password])) {
                return response()->json([
                    'response' => 'error',
                    'message' => 'Password or email is invalid',
                    'token' => $token
                ]);
            }
        } catch (JWTAuthException $e) {
            return response()->json([
                'response' => 'error',
                'message' => 'Token creation failed',
            ]);
        }
        return $token;
    }
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->get()->first();
        $isAdmin = User::where('role', 'Admin')->get();
        if ($user && \Hash::check($request->password, $user->password)) // The passwords match...
        {
            $token = self::getToken($request->email, $request->password);
            $user->auth_token = $token;
            $user->save();
            if ($user->role == 'Admin' && $user->surveillant_id != '') {
                foreach ($isAdmin as $admin) {
                    if ($admin->id == $user->surveillant_id) {
                        $user->fullname = $admin->first_name . ' ' . $admin->last_name;
                        $user->Email = $admin->email;
                        $user->Phone = $admin->phone;
                    }
                }
            }
            $response = ['success' => true, 'data' => $user];
        } else
            $response = ['success' => false, 'data' => 'Record doesnt exists'];
        return response()->json($response, 201);
    }
    public function Logout()
    {
        Auth::logout();
        $response = [
            'success' => true,
            'message' => 'Successfull logout user'
        ];
        return response()->json($response, 201);
    }
    public function register(CreateuserAPIRequest $request)
    {
        $payload = [
            'role' => $request->role,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'address' => $request->address,




            'auth_token' => ''
        ];
        $user = new \NdaartuAPI\User($payload);
        if ($user->save()) {
            $token = self::getToken($request->email, $request->password); // generate user token
            if (!is_string($token))  return response()->json(['success' => false, 'data' => 'Token generation failed'], 201);
            $user = \NdaartuAPI\User::where('email', $request->email)->get()->first();
            $user->auth_token = $token; // update user token
            $user->save();
            $response = ['success' => true, 'data' => ['name' => $user->name, 'id' => $user->id, 'email' => $request->email, 'auth_token' => $token]];
        } else
            $response = ['success' => false, 'data' => 'Couldnt register user'];
        return response()->json($response, 201);
    }

    public function registerAdmin(CreateuserAPIRequest $request)
    {
        $payload = [
            'role' => $request->"surveillant",
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'address' => $request->address,




            'auth_token' => ''
        ];
        $user = new \NdaartuAPI\User($payload);
        if ($user->save()) {
            $token = self::getToken($request->email, $request->password); // generate user token
            if (!is_string($token))  return response()->json(['success' => false, 'data' => 'Token generation failed'], 201);
            $user = \NdaartuAPI\User::where('email', $request->email)->get()->first();
            $user->auth_token = $token; // update user token
            $user->save();
            $response = ['success' => true, 'data' => ['name' => $user->name, 'id' => $user->id, 'email' => $request->email, 'auth_token' => $token]];
            'id' => $user->surveillant_id;
        } else
            $response = ['success' => false, 'data' => 'Couldnt register user'];
        return response()->json($response, 201);
    }
    public function registerEleve(CreateuserAPIRequest $request)
    {
        $payload = [
            'role' => $request->"eleve",
            //'email' => $request->email,
            //'password' => \Hash::make($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
          //  'phone' => $request->phone,
            'address' => $request->address,




            'auth_token' => ''
        ];
        $user = new \NdaartuAPI\User($payload);
        if ($user->save()) {
          //  $token = self::getToken($request->email, $request->password); // generate user token
            //if (!is_string($token))  return response()->json(['success' => false, 'data' => 'Token generation failed'], 201);
            //$user = \NdaartuAPI\User::where('email', $request->email)->get()->first();
          //  $user->auth_token = $token; // update user token
            $user->save();
            $response = ['success' => true, 'data' => [ 'id' => $user->id, 'first_name' => $user->first_name]];
            'id' => $user->eleve_id;
        } else
            $response = ['success' => false, 'data' => 'Couldnt register user'];
        return response()->json($response, 201);
    }
    public function registerProfesseur(CreateuserAPIRequest $request)
    {
        $payload = [
            'role' => $request->"professeur",
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'address' => $request->address,




            'auth_token' => ''
        ];
        $user = new \NdaartuAPI\User($payload);
        if ($user->save()) {
            $token = self::getToken($request->email, $request->password); // generate user token
            if (!is_string($token))  return response()->json(['success' => false, 'data' => 'Token generation failed'], 201);
            $user = \NdaartuAPI\User::where('email', $request->email)->get()->first();
            $user->auth_token = $token; // update user token
            $user->save();
            $response = ['success' => true, 'data' => ['first_name' => $user->first_name, 'id' => $user->id, 'email' => $request->email, 'auth_token' => $token]];
            'id' => $user->professeur_id;
        } else
            $response = ['success' => false, 'data' => 'Couldnt register user'];
        return response()->json($response, 201);
    }
    public function registerParent(CreateuserAPIRequest $request)
    {
        $payload = [
            'role' => $request->"parent",
            'email' => $request->email,
            //'password' => \Hash::make($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'address' => $request->address,




            'auth_token' => ''
        ];
        $user = new \NdaartuAPI\User($payload);
        if ($user->save()) {
          //$token = self::getToken($request->email, $request->password); // generate user token
            //if (!is_string($token))  return response()->json(['success' => false, 'data' => 'Token generation failed'], 201);
            //$user = \NdaartuAPI\User::where('email', $request->email)->get()->first();
            //$user->auth_token = $token; // update user token
            $user->save();
            $response = ['success' => true, 'data' => ['first_name' => $user->first_name, 'id' => $user->id, 'email' => $request->email]];
            'id' => $user->parent_id;
        } else
            $response = ['success' => false, 'data' => 'Couldnt register user'];
        return response()->json($response, 201);
    }
    


}
