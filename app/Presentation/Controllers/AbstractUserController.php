<?php

namespace App\Presentation\Controllers;

interface AbstractUserController extends AbstractController
{
    public function signIn();

    public function signUp();
    
    public function validateToken();
}