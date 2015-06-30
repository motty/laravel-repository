<?php namespace Motty\Laravel\Repository\Eloquent\Traits;

/**
 * Model trait provides the standard functions to interact to eloquent models
 *
 * @package Motty\Laravel\Repository\Traits
 */
trait Model
{
    /**
     * The repository model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * The query builder
     *
     * @var \Illuminate\Database\Eloquent\Builder
     */
    protected $query;

    /**
     * Get a new query builder for the model's table
     *
     * @return $this
     */
    public function newQuery()
    {
        $this->query = $this->model->newQuery();

        return $this;
    }
}
