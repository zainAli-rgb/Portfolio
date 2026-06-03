<?php

namespace App\Repositories\Interfaces;

interface AuthInterface
{
    public function registerPage();
    public function loginView();
    public function register($data);
    public function login($data);
    public function logout($data);
}
