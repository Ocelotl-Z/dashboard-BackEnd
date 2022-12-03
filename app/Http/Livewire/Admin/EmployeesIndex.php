<?php

namespace App\Http\Livewire\Admin;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeesIndex extends Component
{

    use WithPagination;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $paginationTheme = "bootstrap";


    public function render()
    {


        $company_id = User::find(auth()->user()->id)->company->id;

        $employees = Employee::where('company_id', '=', $company_id)
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->paginate(8);

        return view('livewire.admin.employees-index', compact('employees'));
    }
}
