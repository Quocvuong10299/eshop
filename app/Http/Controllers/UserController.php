<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function signUpView()
    {
        return view('user.sign-up');
    }

    public function signUpAction(Request $request)
    {
        $isUser = User::query()
            ->where('email', '=', $request->input('email'))
            ->orWhere('phone', '=', $request->input('phone'))
            ->first();

        if ($isUser) {
            return redirect()->back()->with('signup.failed', 'Đã tồn tại người dùng này');
        }

        $validator = Validator::make($request->all(), [
            'email' => 'email',
            'fullName' => 'required',
            'password' => 'required',
            'phone' => 'digits:10',
        ]);

        if ($validator->fails())
            return redirect()
                ->back()
                ->with('signup.failed', 'Thông tin không hợp lệ')
                ->withInput();

        $userRequest = $request->except('_token');
        $userRequest['password'] = Hash::make($userRequest['password']);

        do {
            $uuid = (string)Str::uuid();
        } while (!User::query()->where('uuid', '=', $uuid));
        $userRequest['uuid'] = $uuid;

        $user = new User();

        $user->userID = $userRequest['uuid'];
        $user->fullName = $userRequest['fullName'];
        $user->email = $userRequest['email'];
        $user->phone = $userRequest['phone'];
        $user->avatar = $userRequest['avatar'];
        $user->password = $userRequest['password'];
        $user->address = $userRequest['address'];

        $user->save();

        return response()->json([
            'status' => 200,
            'message' => 'Đăng ký thành công',
            'data' => $request->except(['_token', 'password'])
        ]);
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::query()
            ->where('email', '=', $email)
            ->first();

        if (!$user) {
            return response()->json([
                'status' => 500,
                'message' => 'Không tồn tại user với email: ' . $email,
            ]);
        } else if (!Hash::check($password, $user->password)) {
            return response()->json([
                'status' => 500,
                'message' => 'Mật khẩu không khớp. Vui lòng kiểm tra lại',
            ]);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Đăng nhập thành công',
            'data' => $user,
        ]);
    }
}
