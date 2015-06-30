<?php namespace Motty\Laravel\Repository\Criteria;

use Motty\Laravel\Repository\Contracts\Repository as RepositoryContract;

abstract class BaseCriteria
{
    /**
     * Apply a criteria
     *
     * @param  $query
     * @param  RepositoryContract  $repository
     * @return mixed
     */
    abstract public function apply($query, RepositoryContract $repository);
}
