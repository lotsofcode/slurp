<?php namespace Lotsofcode\Slurp;

use Illuminate\Support\Facades\Facade;

class Slurp extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'slurp'; }

}
