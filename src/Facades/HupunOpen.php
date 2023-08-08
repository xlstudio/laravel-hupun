<?php

namespace Xlstudio\Hupun\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Xlstudio\Hupun
 */
class HupunOpen extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'hupunOpen';
    }
}
