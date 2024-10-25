<?php

namespace App\Livewire\Forms;

use App\Models\Account;
use App\Models\Organization;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;

class OrganizationForm extends Form
{
    public Organization $organization;
    #[Validate]
    public $account_id;
    #[Validate]
    public $name;
    #[Validate]
    public $email;
    #[Validate]
    public $phone;
    #[Validate]
    public $address;
    #[Validate]
    public $city;
    #[Validate]
    public $country;
    #[Validate]
    public $region;
    #[Validate]
    public $postal_code;

    public function setOrganization(Organization $organization)
    {
        $this->organization = $organization;
        $this->account_id = $organization->account_id;
        $this->name = $organization->name;
        $this->email = $organization->email;
        $this->phone = $organization->phone;
        $this->address = $organization->address;
        $this->city = $organization->city;
        $this->country = $organization->country;
        $this->region = $organization->region;
        $this->postal_code = $organization->postal_code;
    }

    public function rules()
    {
        return [
            "account_id" => ["required", "exists:accounts,id"],
            'name' => ['required', 'max:100', "nullable"],
            'email' => ['email', 'max:50', "nullable"],
            'phone' => ['max:50', "nullable"],
            'address' => ['max:150', "nullable"],
            'city' => ['max:50', "nullable"],
            'country' => ['max:2', "nullable"],
            'postal_code' => ['max:25', "nullable"],
        ];
    }

    public function update()
    {
        $this->validate();

        $this->organization->update($this->except('organization'));
    }

    public function create()
    {
        $this->account_id = Account::find(1)->id;
        $this->validate();

        Organization::create($this->all());

    }
}
