<?php

namespace App\Livewire;

use App\Livewire\Forms\OrganizationForm;
use Livewire\Component;

class OrganizationsCreate extends Component
{
    public OrganizationForm $form;

    public function render()
    {
        return view('livewire.organizations-create');
    }

    public function save()
    {
        $this->form->create();

        return $this->redirect('/organizations', navigate: true);
    }
}
