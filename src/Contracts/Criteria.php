<?php namespace Motty\Laravel\Repository\Contracts;

use Motty\Laravel\Repository\Criteria\BaseCriteria;

interface Criteria
{
    /**
     * @param  bool  $status
     * @return $this
     */
    public function skipCriteria($status = true);

    /**
     * @return mixed
     */
    public function getCriteria();

    /**
     * @param  BaseCriteria  $criteria
     * @return $this
     */
    public function getByCriteria(BaseCriteria $criteria);

    /**
     * @param  BaseCriteria  $criteria
     * @return $this
     */
    public function pushCriteria(BaseCriteria $criteria);

    /**
     * @return $this
     */
    public function applyCriteria();
}
