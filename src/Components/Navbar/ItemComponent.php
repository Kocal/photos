<?php

namespace App\Components\Navbar;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('navbar-item')]
class ItemComponent
{
    public string $routeName;
    public array $routeParameters = [];
    public string $text;
}