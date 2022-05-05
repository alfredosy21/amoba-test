<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAuthController extends Controller {

    /**
     * Login user
     * @param Request $request
     * @return boolean|\App\Http\Controllers\booleanLogin
     * @param Request $request
     * @return boolean
     */
    public function login(Request $request) {
        try {
            $data = $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            if (!auth()->attempt($data)) {
                return response(['error' => 'Datos incorrectos'], 401);
            }
            $token = auth()->user()->createToken('API Token')->accessToken;

            return response(['user' => auth()->user(), 'token' => $token], 200);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * User Logout
     * @return boolean
     */
    public function logout() {
        try {

            if (auth()->guard('api')->check()) {
                $token = auth()->guard('api')->user()->token();
                $token->revoke();
            }

            return response(['msg' => 'has cerrado la sesion'], 200);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Get user data
     * @param Request $request
     * @return boolean
     */
    public function getUser(Request $request) {
        try {
            if (auth()->guard('api')->check()) {
                return response(['user' => auth()->guard('api')->user()], 200);
            } else {
                return response(['msg' => 'has cerrado la sesion'], 401);
            }
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

}
