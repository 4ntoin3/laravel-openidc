<?php

namespace AuthOpenIdConnect\Facades;


use Illuminate\Support\Facades\Facade;

class OpenIdConnectClient extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'OpenIdConnectClient'; }

}