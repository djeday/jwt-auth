<?php

namespace App\Presentation\Views;

class ViewFactory
{
    public static function create(): AbstractView
    {
        return new View();
    }
}