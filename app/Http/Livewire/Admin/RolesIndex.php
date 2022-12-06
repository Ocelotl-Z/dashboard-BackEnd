<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;

class RolesIndex extends Component
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


        $roles = Role::where('guard_name', 'company')->where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })->paginate(8);

        return view('livewire.admin.roles-index', compact('roles'));
    }
}
