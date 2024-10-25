<?php

namespace App\Livewire;

use App\Models\Account;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class OrganizationsTable extends Component
{
    use WithPagination;

    public $account;
    public $search;

    public function mount()
    {
        $this->account = Account::whereName('Acme Corporation')->first();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    #[Computed]
    public function organizations()
    {
        return $this->account
            ->organizations()
            ->filter(['search' => $this->search])
            ->orderBy('name')
            ->paginate(10);
    }
}
