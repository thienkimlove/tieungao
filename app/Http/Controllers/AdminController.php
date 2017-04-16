<?php

namespace App\Http\Controllers;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Laravel\Socialite\Facades\Socialite;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth.backend',  ['except' => [
            'ajax',
            'redirectToGoogle',
            'handleGoogleCallback',
            'notice'
        ]]);
    }

    /**
     * Save images
     * @param $file
     * @param null $old
     * @return string
     */
    public function saveImage($file, $old = null)
    {
        $filename = md5(uniqid().'_'.time()) . '.' . $file->getClientOriginalExtension();
        Image::make($file->getRealPath())->save(public_path('files/' . $filename));
        if ($old) {
            @unlink(public_path('files/' . $old));
        }
        return $filename;
    }


    /** Redirect to G+ authenticate.
     * @return mixed
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        try {
            $userEmail = Socialite::driver('google')->user()->email;

            $user = User::where('email', $userEmail)->get();

            if ($user->count() > 0) {
                session()->put('admin_login', $user->first());
                return redirect('/admin');
            } else {
                flash('Invalid Credentials!');
                return redirect('admin/notice');
            }
        } catch (Exception $e) {
            flash('Error when login! Please try again!');
            return redirect('admin/notice');
        }

    }

    public function logout()
    {
        session()->forget('admin_login');
        return redirect('admin/notice');
    }

    public function index(Request $request)
    {
        $user = session()->get('admin_login');
        return view('admin.index', compact('user'));
    }

    public function notice()
    {
        return view('admin.notice');
    }
}
