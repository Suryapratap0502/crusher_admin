<?php

namespace App\Http\Controllers;

use App\Mail\Mailer;
use App\Models\AuthModel;
use App\Models\PasswordResetModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PharIo\Manifest\Email;
use Illuminate\Database\QueryException;

class AuthController extends Controller
{
    public function validate_page()
    {
        return view('auth/validate_screen');
    }

    public function changepassword_page()
    {
        return view('auth/change_password');
    }

    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'username' => ['required'],
            'password' => 'required|min:6'
        ]);

        if ($validate->fails()) {
            return response()->json(['code' => 401, 'message' => $validate->errors()->toArray()]);
        } else {
            try {
                $username = $request->username;
                $check = AuthModel::where('username', $username)->where('flag', '!=', '2')->first();

                if ($check) {

                    $pass_verify = Hash::check($request->password, $check->password);

                    if ($pass_verify) {
                        if ($check->flag == 1) {
                            $session['admin_login'] = ['id' => $check->id, 'name' => $check->name, 'username' => $check->username, 'email' => $check->email, 'role' => $check->role];
                            Session::put($session);
                            Cookie::queue('login_username', $check->username, time() + 60 * 60 * 24 * 100);
                            Cookie::queue('login_pass', $check->password, time() + 60 * 60 * 24 * 100);

                            return response()->json(['code' => 200, 'message' => 'Login Successfully']);
                        } else {
                            return response()->json(['code' => 403, 'message' => 'Your Account has been deavtived,Contact to ADMIN']);
                        }
                    } else {
                        return response()->json(['code' => 402, 'message' => 'Incorrect Password']);
                    }
                } else {
                    return response()->json(['code' => 403, 'message' => 'Username not found']);
                }
            } catch (QueryException $e) {
                return response()->json([
                    'code' => 500,
                    'message' => 'Check server connection or connect to server administrator'
                ]);
            }
        }
    }

    public function validate_n_sendMail(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => ['required'],
        ]);

        if ($validate->fails()) {
            return response()->json(['code' => 401, 'message' => $validate->errors()->toArray()]);
        } else {
            $email = $request->email;
            $check = AuthModel::where('email', $email)->first();
            if ($check) {
                $key = Str::random(10);
                $mailData = [
                    'title' => 'Mail From Udhar For Reset Password',
                    'body' => 'This is for reset password for ADMIN.',
                    'key' => $key
                ];

                $data['email'] = $email;
                $data['reset_key'] = $key;

                $save_key = PasswordResetModel::insert($data);

                if ($save_key) {
                    $send_mail = Mail::to('surya.pratap@maishainfotech.com')->send(new Mailer($mailData));
                    if ($send_mail) {
                        return response()->json(['code' => 200, 'message' => 'Mail Send Successfully']);
                    }
                }
            } else {
                return response()->json(['code' => 403, 'message' => 'Email not found']);
            }
        }
    }

    public function validate_key(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'validator_key' => ['required'],
        ]);
        if ($validate->fails()) {
            return response()->json(['code' => 401, 'message' => $validate->errors()->toArray()]);
        } else {
            $email = $request->email;
            $fetch_key = PasswordResetModel::where('email', $email)->where('flag', '1')->first();

            if ($fetch_key->reset_key == $request->validator_key) {
                $data['flag'] = 0;
                $update_status = PasswordResetModel::where('email', $email)->where('reset_key', $fetch_key->reset_key)->update($data);
                if ($update_status) {
                    return response()->json(['code' => 200, 'message' => 'Your key has been verified']);
                } else {
                    return response()->json(['code' => 400, 'message' => 'Check server conncetivity']);
                }
            } else {
                return response()->json(['code' => 400, 'message' => 'Invalid Key,Please try again']);
            }
        }
    }

    public function change_password_action(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'password' => ['required'],
            'confirm_password' => ['required']
        ]);
        if ($validate->fails()) {
            return response()->json(['code' => 401, 'message' => $validate->errors()->toArray()]);
        } else {
            if ($request->password == $request->confirm_password) {
                $email = $request->email;
                $password = Hash::make($request->password);
                $data['password'] = $password;
                $update_password = AuthModel::where('email', $email)->update($data);
                if ($update_password) {
                    $check = AuthModel::where('email', $email)->first();
                    $session['admin_login'] = ['id' => $check->id, 'name' => $check->name, 'username' => $check->username, 'email' => $check->email, 'role' => $check->role];
                    Session::put($session);
                    Cookie::queue('login_username', $check->username, time() + 60 * 60 * 24 * 100);
                    Cookie::queue('login_pass', $check->password, time() + 60 * 60 * 24 * 100);
                    return response()->json(['code' => 200, 'message' => 'Password Changed Successfully']);
                } else {
                    return response()->json(['code' => 400, 'message' => 'Check server Connectivity']);
                }
            } else {
                return response()->json(['code' => 400, 'message' => 'Password & Confirm Password Must be same']);
            }
        }
    }
}
