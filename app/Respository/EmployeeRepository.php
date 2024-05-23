<?php

namespace App\Respository;

use App\Models\Employee;
use Illuminate\Contracts\Pagination\Paginator;

class EmployeeRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private Employee $model
    )
    {
    }

    public function search(string $search = null , int $page = 1, int $perPage = 5): Paginator
    {
        $employees = Employee::with('departament')
            ->where('first_name', 'like', '%' . $search . '%')
            ->orWhereHas('departament', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->paginate($perPage, ['*'], 'page', $page);

        return $employees;
    }
}
