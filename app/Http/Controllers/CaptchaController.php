<?php


namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;

class CaptchaController extends Controller
{

    public function create()
    {
        return view('captchacreate');
    }

    public function captchaValidate(array $data)
    {
        $request->validate::make($data, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'captcha' => 'required|captcha'
        ]);
    }

    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    // protected function captchaValidate(array $data)
    // {
    //     return Validate::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255',
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //         'captcha' => ['required|captcha']
    //     ]);
    // }

    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }
}