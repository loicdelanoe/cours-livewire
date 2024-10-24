<?php

namespace App\Livewire;

use App\Livewire\Forms\OrganizationForm;
use App\Models\Organization;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class OrganizationsEdit extends Component
{
    public OrganizationForm $form;
    public $organization;
    public $feedback = '';


    public function mount(Organization $organization): void
    {
        $this->organization = $organization;
        $this->organization->load('contacts');
        $this->form->setOrganization($organization);
    }

    public function save()
    {
        $this->form->update();

        $this->dispatch('organization-edit');
    }

    public function render(): View
    {
        return view('livewire.organizations-edit');
    }
}
