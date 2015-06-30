<?php namespace Motty\Laravel\Repository\Eloquent\Traits;

/**
 * Crudable trait provides the standard functions for any repository
 * that implements CRUD
 *
 * @package Motty\Laravel\Repository\Traits
 */
trait Crudable
{
    /**
     * Create an entity
     *
     * @param  array  $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Find an entity by id
     *
     * @param  mixed  $id
     * @param  array  $columns
     * @return \Illuminate\Support\Collection|static|null
     */
    public function find($id, array $columns = ['*'])
    {
        $this->newQuery()->eagerLoadRelations()->applyCriteria();
        return $this->query->find($id, $columns);
    }

    /**
     * Update an entity
     *
     * @param  array  $data
     * @param  mixed  $id
     * @param  string  $attribute
     * @return bool|int
     */
    public function update(array $data, $id, $attribute = 'id')
    {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    /**
     * Delete an entity
     *
     * @param  $ids
     * @return bool|null
     */
    public function delete($ids = null)
    {
        if (is_null($ids)) {
            $this->newQuery()->applyCriteria();
            return $this->query->delete();
        } else {
            return $this->model->destroy($ids);
        }
    }
}
