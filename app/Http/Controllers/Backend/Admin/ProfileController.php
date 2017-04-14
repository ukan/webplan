<?php

namespace App\Http\Controllers\Backend\Admin;

use Hash;
use URL;
use Sentinel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'user' => user_info(),
            'formProfile' => [
                'method' => 'PUT',
                'url' => URL::route('admin-profile-update', 'profile'),
                'files' => true,
            ],
            'formPassword' => [
                'method' => 'PUT',
                'url' => URL::route('admin-profile-update', 'password'),
            ],
            'skins' => config('ahloo.skins'),
        ];

        return view('backend.profile', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type)
    {
        if ('profile' == $type) {
            $this->updateProfile($request);
        } else {
            $this->updatePassword($request);
        }

        return redirect()->action('Backend\Admin\ProfileController@index');
    }

    /**
     * Handle update profile.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    private function updateProfile(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'image',
            'email' => 'required|email|unique:users,email,'.user_info('id'),
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $data = $request->except('_token', '_method');
        $user = user_info();

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');

            if ($avatar->isValid()) {
                $fileName = date('Y_m_d_His').'_'.$avatar->getClientOriginalName();

                $avatar->move(avatar_path(), $fileName);
                if ($user->avatar && file_exists(avatar_path($user->avatar))) {
                    unlink(avatar_path($user->avatar));
                }

                $data['avatar'] = $fileName;
            }
        }

        flash()->success(trans('general.public.save_success'));

        Sentinel::update($user, $data);
    }

    /**
     * Handle update password.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    private function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        $redirect = redirect()->action('Backend\Admin\ProfileController@index');

        if (! Hash::check($request->input('old_password'), user_info('password'))) {
            flash()->error('Wrong old password!');

            return $redirect;
        }

        Sentinel::update(user_info(), ['password' => $request->input('password')]);

        flash()->success(trans('general.public.save_success'));
    }
}
