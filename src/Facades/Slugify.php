<?php

namespace rafapaulino\Slugify\Facades;

use Illuminate\Support\Facades\Facade;

class Slugify extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'slugify';
    }
}
