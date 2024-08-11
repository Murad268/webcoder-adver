<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Auth;

class LogoutService
{
    public function logout()
    {
        try {
            Auth::logout();


            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
