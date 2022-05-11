<?php

namespace App\Components\Navbar;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('navbar-item')]
class ItemComponent
{
    public string $routeName;
    /** @var array<string,mixed>  */
    public array $routeParameters = [];
    public string $text;
}