<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/added';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|min:4|max:50',
            'mail' => 'required|string|email|min:4|max:255|unique:users',
            'password' => 'required|string|min:4|max:12',
            'password-confirm' => 'required|string|min:4|max:12|same:password',
        ], [
            'username.required' => '名前は必須項目です',
            'username.min' => '4文字以上で入力してください',
            'username.max' => '50文字以下で入力してください',
            'mail.required' => 'メールは必須項目です',
            'mail.email' => 'Eメールを入力してください',
            'mail.min' => '４文字以上で入力してください',
            'mail.max' => '225文字以内で入力してください',
            'mail.unique' => '登録済みのメールアドレスは使用出来ません',
            'password.required' => 'パスワードを入力してください',
            'password.min' => '４文字以上で入力してください',
            'password.max' => '１２文字以内で入力してください',
            'password-confirm.required' => 'パスワードを入力してください',
            'password-confirm.same' => 'パスワードと同じパスワードを入力してください',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->input();
            $this->validator($data)->validate();
            $this->create($data);
            session()->put('name', $data['username']);
            return redirect('added');
        }
        return view('auth.register');
    }

    public function added()
    {
        $name = session()->get('name');
        return view('auth.added', compact('name'));
    }
}
