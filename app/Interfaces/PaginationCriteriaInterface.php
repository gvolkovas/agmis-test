<?php declare(strict_types=1);

namespace App\Interfaces;

interface PaginationCriteriaInterface
{
    public function setPage(int $page): PaginationCriteriaInterface;

    public function setPerPage(int $perPage): PaginationCriteriaInterface;

    public function getPage(): int;

    public function getPerPage(): int;
}
