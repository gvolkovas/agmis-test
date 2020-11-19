<?php declare(strict_types=1);

namespace App\Foundations;

use App\Interfaces\PaginationCriteriaInterface;

class PaginationCriteria implements PaginationCriteriaInterface
{
    private int $page;
    private int $perPage;

    public function __construct(int $page = 1, int $perPage = 25)
    {
        $this->page = $page;
        $this->perPage = $perPage;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getPerPage(): int
    {
        return $this->perPage;
    }

    public function setPage(int $page): PaginationCriteriaInterface
    {
        $this->page = $page;

        return $this;
    }

    public function setPerPage(int $perPage): PaginationCriteriaInterface
    {
        $this->perPage = $perPage;

        return $this;
    }
}
