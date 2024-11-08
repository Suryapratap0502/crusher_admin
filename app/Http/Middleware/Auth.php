<?php

namespace App\Http\Middleware;

use App\Models\AuthModel;
use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    
    public function handle(Request $request, Closure $next)
    {
        
        $username = Cookie::get('login_username');
        $password = Cookie::get('login_pass');

        if (!empty($email) && !empty($password)) {
           
            $check = AuthModel::where('username', $username)->first();

            if (!empty($check)) {
                $data2 = AuthModel::where('username', $username)->where('flag', '!=', '2')->first();

                if (!empty($data2)) {
                    if ($password == $data2->password) {

                        Cookie::queue('login_email', $email, time() + 60 * 60 * 24 * 100);
                        Cookie::queue('login_pass', $password, time() + 60 * 60 * 24 * 100);

                        $session['admin_login'] = ['id' => $check->id, 'name' => $check->name, 'username' => $check->username, 'email' => $check->email, 'role' => $check->role];
                        Session::put($session);
                    } else {
                        Session::flash('message', 'Your Password is updated. Please login again');
                        return redirect('/');
                    }
                } else {
                    Session::flash('message', 'Your account is deactivated by Admin. Please contact admin');
                    return redirect('/');
                }
            } else {
                Session::flash('message', 'Email address not found');
                return redirect('/');
            }
        } else {
            return redirect('/');
        }

        return $next($request);
    }
}
