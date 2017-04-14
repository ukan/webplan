<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Redis;
use Redirect;
use Request;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function redis($language){
        session()->put('language', $language);
        
        return Redirect::back();
    }
    public function index()
    {   
        
        dd("dsd");
        return view('frontend.dashboard.home');
    }
    public function sign_in(){
        $form = [
            'url' => route('admin-login'),
            'autocomplete' => 'off',
        ];

        return view('auth.partials.signin', compact('form'))->with('type','member');
    }

    public function postLogin(Request $request)
    {
        if($request->input('type') == "member"){
            $route_login_type = "admin-login-member";
            $route_dashboard_type = "admin-dashboard-member";
        }else{
            $route_login_type = "admin-login";
            $route_dashboard_type = "admin-dashboard";
        }
        $backToLogin = redirect()->route($route_login_type)->withInput();
        $findUser = Sentinel::findByCredentials(['login' => $request->input('email')]);

        // If we can not find user based on email...
        if (! $findUser) {
            flash()->error('Wrong email!');

            return $backToLogin;
        }

        try {
            $remember = (bool) $request->input('remember_me');
            $user = User::where('email',$request->input('email'));
            if($user->count() > 0){
                $user = User::find($user->first()->id);
            }
            
            // If password is incorrect...
            if (! Sentinel::authenticate($request->all(), $remember)) {
                flash()->error('Password is incorrect!');
                return $backToLogin;
            }

            if (strtolower(Sentinel::check()->roles[0]->slug) != 'member' and $request->input('type') == "member" or strtolower(Sentinel::check()->roles[0]->slug) == 'member' and $request->input('type') == "admin") {
                flash()->error('You Have No Access!');
                Sentinel::logout();
                return $backToLogin;
            }

            if ($request->input('remember_me') == TRUE) {
                Session::put('field_email',$request->input('email'));
                Session::put('field_password',$request->input('password'));
            }

            if (!empty($_SERVER['HTTP_CLIENT_IP'])){
              $ip=$_SERVER['HTTP_CLIENT_IP'];
            }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
              $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
            }else{
              $ip=$_SERVER['REMOTE_ADDR'];
            }
            $ipAddress = $ip;
            
            $getEmail = User::where('email','=', $request->email)->get();
            foreach ($getEmail as $value) {
                $idUser = $value->id;   
            }

            $logs = new AuthLog;
            $logs->user_id = $idUser;
            $logs->ip_address = $ipAddress;
            $logs->login = date('Y-m-d H:i:s');
            $logs->save();

            flash()->success('Login success!');
            return redirect()->route($route_dashboard_type);
        } catch (ThrottlingException $e) {
            flash()->error('Too many attempts!');
        } catch (NotActivatedException $e) {
            flash()->error('Please activate your account before trying to log in.');
        }

        return $backToLogin;
    }

    public function sign_up(){
        
    }
    public function contact(){
        
        return view('frontend.contact.contact_us');
    }
}