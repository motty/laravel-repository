<?php namespace Motty\Laravel\Repository\Eloquent\Traits;

/**
 * EagerLoading trait provides the standard functions for any repository
 * that implements Eager Loading
 *
 * @package Motty\Laravel\Repository\Traits
 */
trait EagerLoading
{
    /**
     * Relations to be attached to the model
     *
     * @var array
     */
    protected $with;

    /**
     * Set the relationships that should be eager loaded
     *
     * @param  string|array  $relations
     * @return $this
     */
    public function with($relations)
    {
        if (is_string($relations)) {
            $relations = func_get_args();
        }

        $this->with = $relations;

        return $this;
    }

    /**
     * Attach each provided relation to the model
     *
     * @return $this
     */
    protected function eagerLoadRelations()
    {
        if (!is_null($this->with)) {
            foreach ($this->with as $relation) {
                $this->query->with($relation);
            }
        }

        return $this;
    }
}
