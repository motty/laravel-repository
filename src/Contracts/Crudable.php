<?php namespace Motty\Laravel\Repository\Contracts;

/**
 * Crudable provides the standard functions to be expected of ANY
 * repository that implements CRUD
 *
 * @package Motty\Laravel\Repository\Contracts
 */
interface Crudable
{
    /**
     * Create an entity
     *
     * @param  array  $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $attributes);

    /**
     * Find an entity by id
     *
     * @param  mixed  $id
     * @param  array  $columns
     * @return \Illuminate\Support\Collection|static|null
     */
    public function find($id, array $columns = ['*']);

    /**
     * Update an entity
     *
     * @param  array  $data
     * @param  mixed  $id
     * @param  string  $attribute
     * @return bool|int
     */
    public function update(array $data, $id, $attribute = 'id');

    /**
     * Delete an entity
     *
     * @param  $ids
     * @return bool|null
     */
    public function delete($ids = null);
}
