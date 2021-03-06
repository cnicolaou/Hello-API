<?php

namespace Mega\Services\Core\Repository\Criterias\Eloquent;

use Mega\Services\Core\Repository\Abstracts\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class ThisUserCriteria
 *
 * @type    Criteria
 * @package Mega\Services\Core\Repository\Criterias\Eloquent
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class ThisUserCriteria extends Criteria
{

    /**
     * @var int
     */
    private $userId;

    /**
     * ThisUserCriteria constructor.
     *
     * @param $userId
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @param                                                   $model
     * @param \Prettus\Repository\Contracts\RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->where('user_id', '=', $this->userId);
    }
}

