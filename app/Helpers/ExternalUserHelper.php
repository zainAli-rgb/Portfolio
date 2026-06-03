<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class ExternalUserHelper
{
    public static function setSession(string $companyName, int $userId, string $companyUrl)
    {
        session()->put('external_user', [
            'company_name' => $companyName,
            'user_id' => $userId,
            'company_url' => $companyUrl,
        ]);
    }

    public static function get()
    {
        return session('external_user', null);
    }

    public static function isLoggedIn(): bool
    {
        return session()->has('external_user.user_id') &&
            session()->has('external_user.company_name');
    }

    public static function clear()
    {
        session()->forget('external_user');
    }

    public static function getUserId()
    {
        // Internal app user
        if (Auth::check()) {
            return Auth::id();
        }

        // External user
        if (self::isLoggedIn()) {
            $user = self::get();
            return $user['company_name'] . '_' . $user['user_id'];
        }

        return 1;
    }
}
