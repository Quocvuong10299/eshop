<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendEmail;
use App\Models\Admin;
use App\Token\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    private $token;

    public function __construct(Token $token)
    {
        $this->token = $token;
    }

    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return redirect('/admin/dashboard');
        }

        return $this->checkAdminExists() ? redirect()->route('admin.signUp') : view('admin.index');
    }

    public function checkAdminExists()
    {
        $admin = Admin::all();
        return $admin->count() == 0;
    }

    public function checkAdminEmailExists($email)
    {
        $admin = Admin::where('email', '=', $email)
            ->where('activated', '=', '1')
            ->first();

        if ($admin != null) {
            return response()->json([
                'status' => 200,
                'name' => $admin->fullName,
                'email' => $email,
            ]);
        }

        return response()->json([
            'status' => 404,
        ]);
    }

    public function checkPassword(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $credential = [
            'email' => $email,
            'password' => $password,
        ];

        $isAdmin = Auth::guard('admin')->attempt($credential);
        $status = $isAdmin ? 200 : 401;

        return response()->json([
            'status' => $status
        ]);
    }

    public function showSignUpView()
    {
        return view('admin.sign-up');
    }

    public function handleSignUp(Request $request, SendEmail $sendEmail)
    {
        $isAdmin = Admin::query()
            ->where('email', '=', $request->input('email'))
            ->first();

        if ($isAdmin) {
            return redirect()->back()->with('signup.failed', __('messages.sign_up_failed_existed'));
        }

        $validator = Validator::make($request->all(), [
            'email' => 'email',
            'fullName' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails())
            return redirect()
                ->back()
                ->with('signup.failed', __('messages.sign_up_failed_validate'))
                ->withInput();

        $adminRequest = $request->except('_token');
        $adminRequest['password'] = Hash::make($adminRequest['password']);

        do {
            $uuid = (string)Str::uuid();
        } while (!Admin::query()->where('uuid', '=', $uuid));
        $adminRequest['uuid'] = $uuid;

        $admin = new Admin();

        $admin->user_id = $adminRequest['uuid'];
        $admin->fullName = $adminRequest['fullName'];
        $admin->email = $adminRequest['email'];
        $admin->password = $adminRequest['password'];
        $admin->activated = 0;

        $admin->save();

        $informationEmail = [
            'fullName' => $adminRequest['fullName'],
            'email' => $adminRequest['email'],
            'token' => $this->generateLinkActivated($adminRequest['uuid']),
        ];
        $sendEmail->signUp($informationEmail);

        return redirect()->route('admin')->with('message_done', __('messages.sign_up_sent_email'));
    }

    public function dashboard()
    {
        $activated = intval(Auth::guard('admin')->user()->activated);

        if ($activated == 0) {
            return view('admin.warning-unactivated');
        }

        return view('admin.dashboard.dashboard');
    }

    public function generateLinkActivated($user_id)
    {
        $newToken = $this->token->generateToken($user_id, __('token.verify_email'));
        $url = URL::to('/') . '/admin/activated?token=' . $newToken;
        return $url;
    }

    public function generateLinkForgotPassword($email)
    {
        $newToken = $this->token->generateTokenForgotPassword($email, __('token.forgot_password'));
        $url = URL::to('/') . '/admin/reset-password?token=' . $newToken;
        return $url;
    }

    public function activated(Request $request)
    {
        $token = $request->query('token');
        if ($this->token->verifyToken($token)) {
            $user_id = $this->token->decryptToken($token)['userID'];

            $admin = Admin::where('user_id', '=', $user_id)->first();
            $admin->activated = 1;
            $admin->save();

            return redirect('/admin')->with('message_done', __('messages.activated_done'));
        }

        return redirect('/admin')->with('message_done', __('messages.activated_failed'));
    }

    public function reActivated(SendEmail $sendEmail)
    {
        $informationEmail = [
            'fullName' => Auth::guard('admin')->user()->fullName,
            'email' => Auth::guard('admin')->user()->email,
            'token' => $this->generateLinkActivated(Auth::guard('admin')->user()->user_id),
        ];

        $sendEmail->signUp($informationEmail);

        return redirect('/admin/dashboard')->with('message_check', __('messages.sign_up_check_email'));
    }

    public function forgotPassword(Request $request, SendEmail $sendEmail)
    {
        $email = $request->query('email');

        $informationEmail = [
            'email' => $email,
            'token' => $this->generateLinkForgotPassword($email),
        ];
        $sendEmail->resetPassword($informationEmail);

        return redirect('/admin')->with('message_done', __('messages.forgot_password_sent_email'));
    }

    public function resetPassword(Request $request)
    {
        $token = $request->query('token');

        if ($this->token->verifyToken($token)) {
            return view('admin.reset-password');
        }

        return __('token.verify_token_failed');
    }

    public function handleResetPassword(Request $request)
    {
        $password = $request->get('password');
        $token = $request->get('token');

        $email = $this->token->decryptToken($token)['email'];

        $admin = Admin::where('email', '=', $email)->first();

        $admin->password = Hash::make($password);
        $admin->save();

        return response()->json([
            'status' => 200,
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}
