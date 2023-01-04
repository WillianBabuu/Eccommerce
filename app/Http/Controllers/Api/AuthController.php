<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ResertPasswordMailable;
use App\Models\PasswordReset;
use App\Models\User;
use App\Util\JsonResponse;
use App\Util\LoggerUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules\Password;
use Laravel\Sanctum\PersonalAccessToken;

/**
 * Class AuthController
 *
 * @author Rugemarila Jeremiah
 * @package App\Http\Controllers
 */

class AuthController extends Controller {

    public function register(Request $request) {

        // simple validation 
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
            ],
        ]);

        //create and save user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        // create token 
        $token = $user->createToken('main')->plainTextToken;

        // get data to be returned 
        $returnData = [
            'user' => $user,
            'token' => $token,
            'success_message' => 'Registration Successfully',
        ];

        return response()->json($returnData);
    }

    public function login(Request $request) {

        // validate data 
        $credentials = $request->validate([
            'email' => 'required|email|string',
            'password' => [
                'required'
            ],
        ]);
        // check creditials if correct 
        if(!Auth::attempt($credentials)) {
            $output = "The provided credentials are not correct";
            return response()->json($output);

        }

        /**
         * @var \App\Models\User $user
         */

        //  get user and return data 
        $user = Auth::user();
        $token = $user->createToken('main')->plainTextToken;

        $returnData = [
            'user' => $user,
            'token' => $token,
            'success_message' => 'Registration Successfully',
        ];

        return response()->json($returnData);
        
    }

}
