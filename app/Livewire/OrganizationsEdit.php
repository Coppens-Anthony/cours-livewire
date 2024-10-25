<?php

namespace App\Livewire;

use App\Livewire\Forms\OrganizationForm;
use App\Models\Organization;
use Livewire\Component;

class OrganizationsEdit extends Component
{

    public $organization;
    public $feedback = '';
    public OrganizationForm $form;

    public function mount(Organization $organization)
    {
        $this->form->setOrganization($organization);
        $this->organization = $organization;
        $this->organization->load('contacts');
    }

    public function save()
    {
        $this->form->update();
        $this->feedback = 'The organization was successfully updated';

        to_route("organizations");

    }
}
