<?php namespace Motty\Laravel\Repository\Contracts;

/**
 * EagerLoading provides the standard functions to be expected of ANY
 * repository that implements Eager Loading
 *
 * @package Motty\Laravel\Repository\Contracts
 */
interface EagerLoading
{
    /**
     * Set the relationships that should be eager loaded
     *
     * @param  string|array  $relations
     * @return $this
     */
    public function with($relations);
}
