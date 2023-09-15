<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function registerUser(Request $request) {
        $registrationData = $request->validate([
            "name" => ["required", "min:4", "max:12", Rule::unique("users", "name")],
            "email" => ["required", Rule::unique("users", "email")],
            "password" => ["required", "min:6"]
        ]);

        $registrationData["password"] = bcrypt($registrationData["password"]);
        $user = User::create($registrationData);
        auth()->login($user);

        return redirect("/");
    }

    public function logoutUser() {
        auth()->logout();

        return redirect("/");
    }

    public function loginUser(Request $request) {
        $loginData = $request->validate([
            "existingName" => "required",
            "existingPassword" => "required"
        ]);

        if (auth()->attempt(["name" => $loginData["existingName"], "password" => $loginData["existingPassword"]])) {
            $request->session()->regenerate();
        }

        return redirect("/");
    }
}
