<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = request(['email', 'password']);

        if (auth()->attempt($credentials)) {
            $token = Auth::guard('api')->attempt($credentials);
            return response()->json([
                'success' => true,
                'message' => 'Login Berhasil',
                'token' => $token
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Email atau Password Salah'
        ]);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_member' => 'required' ,
            'no_hp' => 'required' ,
            'email' => 'required|email' ,
            'password' => 'required|same:konfirmasi_password' ,
            'konfirmasi_password' => 'required|same:password' ,
            
        ]);

        if ($validator->fails()) {
            return response() ->json(
                $validator->errors(), 
                 422
            );
        }

        $input = $request->all();
        $input['password'] = bcrypt($request->password);
        unset($input['konfirmasi_password']);
        $Member = Member::create($input);

        return response() ->json([
            'data' => $Member
        ]);
    }


    public function login_member()
    {
        return view('auth.login_member');
    }
    
    public function login_member_action(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required' ,
            'password' => 'required' ,
            
        ]);

        if ($validator->fails()) {
            session::flash('errors', $validator->errors()->toArray());
            return redirect('/login_member');
            
        }

        // $credentials = $request->only('email', 'password');

        $member = Member::where('email', $request->email)->first();

        if ($member) {
            if (Hash::check($request->password, $member->password)) {
                $request->session()->regenerate();
                return redirect('/');

            } else {
                 session::flash('failed', "Password Salah!");
                 return redirect('/login_member');
            }
            
        } else {
            session::flash('failed', 'Email Tidak Ditemukan!');
            return redirect('/login_member');
        }
    }

    public function register_member()
    {
        return view('auth.register_member');
    }
    
    public function register_member_action(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_member' => 'required' ,
            'no_hp' => 'required' ,
            'email' => 'required|email' ,
            'password' => 'required|same:konfirmasi_password' ,
            'konfirmasi_password' => 'required|same:password' ,
            
        ]);

        if ($validator->fails()) {
            session::flash('errors', $validator->errors()->toArray());
            return redirect('/register_member');
            
        }

        $input = $request->all();
        $input['password'] = bcrypt($request->password);
        unset($input['konfirmasi_password']);
        
        Member::create($input);

        session::flash('success','Account Successfully Created!');

        return redirect('/login_member');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }

    public function logout_member()
    {
        Session::flush();
        return redirect('/login_member');
    }
}
