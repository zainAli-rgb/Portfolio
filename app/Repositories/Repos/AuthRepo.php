<?php
namespace App\Repositories\Repos;

use App\Models\User;
use App\Repositories\Interfaces\AuthInterface;
use Exception;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;




class AuthRepo implements AuthInterface
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function registerPage()
    {
        try {
            return view('auth.register');

        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function register($data)
    {
        try {

            DB::beginTransaction();
            $user = $this->user::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phone' => $data['phone'],
            ]);
            DB::commit();
            return redirect()->route('login');

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error is',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function loginView()
    {
        try {
            return view('auth.login');

        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function login($data)
    {


        $loginInput = $data->input('email');

        $fieldType = filter_var($loginInput, FILTER_VALIDATE_EMAIL)
            ? 'email'
            : (preg_match('/^[0-9]+$/', $loginInput) ? 'phone' : 'name');

        if (Auth::attempt([$fieldType => $loginInput, 'password' => $data->password])) {
            $user = Auth::user();

            $user->update([
                'last_login_at' => $user->logedin_at,
                'logedin_at' => now(),
            ]);

            $data->session()->regenerate();

            return redirect()->route('index');
        }

        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.'
        ])->withInput($data->only('login'));
    }
    /*
     * This function will logout user
     */
    public function logout($request)
    {
        Auth::logout();

        if ($request->session()->has('external_user')) {
            $request->session()->forget('external_user');
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

}
