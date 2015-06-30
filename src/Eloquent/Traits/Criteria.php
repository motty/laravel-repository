<?php namespace Motty\Laravel\Repository\Eloquent\Traits;

use Illuminate\Database\Eloquent\Collection;
use Motty\Laravel\Repository\Criteria\BaseCriteria;

/**
 * Criteria trait provides the standard functions for any repository
 * that implements criteria
 *
 * @package Motty\Laravel\Repository\Traits
 */
trait Criteria
{
    /**
     * @var Collection
     */
    protected $criteria;

    /**
     * @var bool
     */
    protected $skipCriteria = false;

    /**
     * @return $this
     */
    public function resetScope()
    {
        $this->skipCriteria(false);
        return $this;
    }

    /**
     * @param bool $status
     * @return $this
     */
    public function skipCriteria($status = true)
    {
        $this->skipCriteria = $status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCriteria()
    {
        return $this->criteria;
    }

    /**
     * @param BaseCriteria $criteria
     * @return $this
     */
    public function getByCriteria(BaseCriteria $criteria)
    {
        $this->query = $criteria->apply($this->query, $this);
        return $this;
    }

    /**
     * @param BaseCriteria $criteria
     * @return $this
     */
    public function pushCriteria(BaseCriteria $criteria)
    {
        $this->criteria->push($criteria);
        return $this;
    }

    /**
     * @return $this
     */
    public function applyCriteria()
    {
        if ($this->skipCriteria === true) {
            return $this;
        }

        foreach ($this->getCriteria() as $criteria) {
            if ($criteria instanceof BaseCriteria) {
                $this->query = $criteria->apply($this->query, $this);
            }
        }

        return $this;
    }
}
