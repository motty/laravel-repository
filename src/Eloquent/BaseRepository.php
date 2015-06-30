<?php namespace Motty\Laravel\Repository\Eloquent;

use Illuminate\Pagination\LengthAwarePaginator;
use Motty\Laravel\Repository\Contracts\Model as ModelContract;
use Motty\Laravel\Repository\Contracts\Crudable as CrudableContract;
use Motty\Laravel\Repository\Contracts\Criteria as CriteriaContract;
use Motty\Laravel\Repository\Contracts\Repository as RepositoryContract;
use Motty\Laravel\Repository\Contracts\EagerLoading as EagerLoadingContract;

use Motty\Laravel\Repository\Eloquent\Traits\Model as ModelTrait;
use Motty\Laravel\Repository\Eloquent\Traits\Criteria as CriteriaTrait;
use Motty\Laravel\Repository\Eloquent\Traits\Crudable as CrudableTrait;
use Motty\Laravel\Repository\Eloquent\Traits\EagerLoading as EagerLoadingTrait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * AbstractBaseRepository provides the standard/base functions of ANY repository
 *
 * @package Motty\Laravel\Repository\Eloquent
 */
abstract class BaseRepository implements RepositoryContract, CrudableContract, EagerLoadingContract, ModelContract, CriteriaContract
{
    use ModelTrait, CriteriaTrait, CrudableTrait, EagerLoadingTrait;

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->criteria = new Collection();
        $this->query = $this->model->newQuery();
    }

    /**
     * Get all of the entities from the database
     *
     * @param  array  $columns
     * @return \Illuminate\Support\Collection|static|null
     */
    public function all($columns = ['*'])
    {
        $this->newQuery()->eagerLoadRelations()->applyCriteria();
        return $this->query->get($columns);
    }

    /**
     * Get an array with the values of a given column.
     *
     * @param  string  $value
     * @param  string  $key
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function lists($value, $key = null)
    {
        $this->newQuery()->eagerLoadRelations()->applyCriteria();
        return $this->query->lists($value, $key);
    }

    /**
     * Get results by page
     *
     * @param  int    $perPage
     * @param  array  $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage = 15, $columns = ['*'])
    {
        $this->newQuery()->eagerLoadRelations()->applyCriteria();
        $paginator = $this->query->paginate($perPage, $columns);

        return $paginator;
    }

    /**
     * Find a single entity by key value
     *
     * @param  string  $attribute
     * @param  string  $value
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function findBy($attribute, $value, $columns = ['*'])
    {
        $this->newQuery()->eagerLoadRelations()->applyCriteria();
        return $this->query->where($attribute, '=', $value)->first($columns);
    }

    /**
     * Find many entities by key value
     *
     * @param  string  $attribute
     * @param  string  $value
     * @param  array  $columns
     * @return \Illuminate\Support\Collection|static[]
     */
    public function findManyBy($attribute, $value, $columns = ['*'])
    {
        $this->newQuery()->eagerLoadRelations()->applyCriteria();
        return $this->query->where($attribute, '=', $value)->get($columns);
    }
}
