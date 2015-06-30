<?php namespace Motty\Laravel\Repository\Contracts;

/**
 * Repository provides the standard functions to be expected of ANY
 * repository
 *
 * @package Motty\Laravel\Repository\Contracts
 */
interface Repository
{
    /**
     * Get all of the entities from the database
     *
     * @param  array  $columns
     * @return \Illuminate\Support\Collection|static|null
     */
    public function all($columns = ['*']);

    /**
     * Get an array with the values of a given column
     *
     * @param  string  $value
     * @param  string  $key
     * @return array
     */
    public function lists($value, $key = null);

    /**
     * Get results by page
     *
     * @param  int    $perPage
     * @param  array  $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage = 15, $columns = ['*']);

    /**
     * Find a single entity by key value
     *
     * @param  string  $attribute
     * @param  string  $value
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function findBy($attribute, $value, $columns = ['*']);

    /**
     * Find many entities by key value
     *
     * @param  string  $attribute
     * @param  string  $value
     * @param  array  $columns
     * @return \Illuminate\Support\Collection|static[]
     */
    public function findManyBy($attribute, $value, $columns = ['*']);
}
