<?php declare(strict_types=1);

namespace App\Repositories;

use App\Foundations\RepositoryFoundation;
use App\Models\Permission;

class PermissionsRepository extends RepositoryFoundation
{
    public function __construct(Permission $model)
    {
        parent::__construct($model);
    }
}
