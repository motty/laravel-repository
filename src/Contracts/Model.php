<?php namespace Motty\Laravel\Repository\Contracts;

/**
 * Model trait provides the standard functions to interact to ELOQUENT models
 *
 * @package Motty\Laravel\Repository\Contracts
 */
interface Model
{
    /**
     * Get a new query builder for the model's table
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function newQuery();
}
