<?php

namespace App\Livewire\Forms;

use App\Models\Account;
use App\Models\Organization;
use Livewire\Attributes\Validate;
use Livewire\Form;

class OrganizationForm extends Form
{
    public Organization $organization;
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
    #[Validate]
    public $account_id;

    public function setOrganization(Organization $organization)
    {
        $this->organization = $organization;
        $this->account_id = $organization->account_id;
        $this->name = $organization->name;
        $this->email = $organization->email;
        $this->phone = $organization->phone;
        $this->city = $organization->city;
        $this->country = $organization->country;
        $this->region = $organization->region;
        $this->postal_code = $organization->postal_code;
        $this->address = $organization->address;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'max:100'],
            'email' => ['email', 'max:50'],
            'phone' => ['max:50'],
            'address' => ['required', 'max:150'],
            'city' => ['max:50'],
            'region' => ['max:50'],
            'country' => ['max:2', 'required'],
            'postal_code' => ['max:25'],
            'account_id' => ['required', 'int']
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
