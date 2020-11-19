<?php declare(strict_types=1);

namespace App\Foundations;

use App\Interfaces\PaginationCriteriaInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class RepositoryFoundation
{
    private Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    protected final function getQueryBuilder(): Builder
    {
        return $this->model->newQuery();
    }

    public final function getIndexPagination(PaginationCriteriaInterface $paginationCriteria): LengthAwarePaginator
    {
        return $this->getQueryBuilder()
            ->paginate($paginationCriteria->getPerPage(), ['*'], 'page', $paginationCriteria->getPage());
    }

    public final function findById(int $id): Model
    {
        return $this->getQueryBuilder()->findOrFail($id);
    }

    public final function getAll(): Collection
    {
        return $this->getQueryBuilder()->get();
    }
}
