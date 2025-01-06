<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Vinkla\Hashids\Facades\Hashids;

class AuthController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Login',
        ];
        return view('admins.auth.index', $data);
    }

    public function authentication(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        try {
            $user = User::where('email',$request->email);
            if ($user->count() > 0) {
                if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                    return response()->json([
                        'message' => 'Login success'
                    ], 200);
                } else {
                    return response()->json([
                        'message' => 'validaton errors, check email and password',
                    ], 422);
                }
            } else {
                return response()->json([
                    'message' => 'validaton errors, check email and password',
                ], 422);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Oops! An error occurred, please check again!',
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        $response['message'] = 'success';

        try {
            if (isset(session()->get('user')['prev_token'])) {
                $hashid = session()->get('user')['prev_token'];
                $user = User::whereId(Hashids::decode($hashid)[0])->first();
                Auth::logout();
                session()->flush();
                Auth::login($user);
                $response['redirect'] = route('users');
            } else {
                Auth::logout();
            }

            return response()->json($response);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Oops! An error occurred, please check again!',
            ], 500);
        }
    }
}
