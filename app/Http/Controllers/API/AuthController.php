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
    public function register(Request $request)
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


    public function registerAdmin(Request $request)
    {
      $this->validate($request,[
        'password'=> 'required|confirmed|min:8',
        'email'=> 'email',
      ]);
        $payload = [
            'role' => "surveillant",
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
            $user->surveillant_id = $user->id  ;
            $user->save();
        } else
            $response = ['success' => false, 'data' => 'Couldnt register user'];
        return response()->json($response, 201);
    }
    public function registerEleve(Request $request)
    {
        $payload = [
            'role' => "eleve",
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'dateDeNaissance'=>$request->dateDeNaissance,
            'lieuDeNaissance'=>$request->lieuDeNaissance,
            'address' => $request->address,



        ];
        $eleve = new \NdaartuAPI\User($payload);
        if ($eleve->save()) {
            $eleve->save();
            $response = ['success' => true, 'data' => [ 'id' => $eleve->id, 'first_name' => $eleve->first_name]];

            $eleve->eleve_id = $eleve->id  ;
            $eleve->save();
            //creation d'un parent apres l'eleve
            $payload1 = [
                'role' => "parent",
                'email' => $request->email,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'address' => $request->address,

            ];
            $parent = new \NdaartuAPI\User($payload1);
            if ($parent->save()) {
                $parent->save();
                $response = ['success' => true, 'data' => ['first_name' => $parent->first_name, 'id' => $parent->id, 'email' => $request->email]];
                $parent->parent_id = $parent->id  ;
                //assignation de l'id de l'eleve pour le parent correspondant
                $parent->eleve_id = $eleve->eleve_id;
                $parent->save();
              } else
                  $response = ['success' => false, 'data' => 'Couldnt register user'];
              return response()->json($response, 201);

        } else
            $response = ['success' => false, 'data' => 'Couldnt register user'];
        return response()->json($response, 201);
    }
    public function registerProfesseur(Request $request)
    {
      $this->validate($request,[
        'password'=> 'required|confirmed|min:8',
        'email'=> 'email',
      ]);
        $payload = [
            'role' => "professeur",
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
            $user->professeur_id = $user->id  ;
            $user->save();
        } else
            $response = ['success' => false, 'data' => 'Couldnt register user'];
        return response()->json($response, 201);
    }



}
