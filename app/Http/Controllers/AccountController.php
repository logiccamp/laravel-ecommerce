<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function loginMain(Request $request)
    {
        $this->validate($request, [
            "email" => "required",
            "password" => "required",
        ]);

        $user = User::where("email", $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect("/login")->with("message", "Invalid login combination");
        }
        $credentials = ["email" => $request->email, "password" => $request->password];
        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            if (session("url") == "") {
                return redirect("/");
            } else {
                return redirect(session("url"));
            }
        }
    }
    public function signup(Request $request)
    {
        $this->validate($request, [
            "email" => ["required", "unique:users", "email"],
            "password" => ["required", "min:8"],
            "fname" => "required",
            "lname" => "required",
        ]);


        $user = User::create([
            'name' => $request->fname . " " . $request->lname,
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            $credentials = ["email" => $request->email, "password" => $request->password];
            if (Auth::attempt($credentials)) {
                request()->session()->regenerate();
                return response()->json(true, 200);
            } else {
                return response()->json(false, 200);
            }
        }


        return response()->json(false, 200);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            "email" => ["required", "email"],
            "password" => ["required"],
        ]);

        $data = [
            'status' => false,
            'message' => "Invalid login combination",
        ];

        $user = User::where("email", $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json($data, 200);
        }
        $credentials = ["email" => $request->email, "password" => $request->password];
        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            $data["status"] = true;
            return response()->json($data, 200);
        }
    }
}
