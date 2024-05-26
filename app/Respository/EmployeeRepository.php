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

    public function search(string $search = null): Paginator
    {
        $employees = Employee::with('departament')
            ->where('first_name', 'like', '%' . $search . '%')
            ->orWhereHas('departament', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->paginate(5);

        return $employees;
    }
}
