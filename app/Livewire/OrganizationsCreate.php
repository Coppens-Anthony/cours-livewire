<?php

namespace App\Livewire;

use App\Livewire\Forms\OrganizationForm;
use Livewire\Component;

class OrganizationsCreate extends Component
{
    public $feedback = '';
    public OrganizationForm $form;

    public function save()
    {
        $this->form->create();
        $this->feedback = 'The organization was successfully created';

        to_route("organizations");
    }
}
