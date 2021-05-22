<?php

namespace App\Http\Livewire;

use App\Models\Language as ModelsLanguage;
use Livewire\Component;

class Language extends Component
{
    public $languages;

    public function mount()
    {
        $availableLanguages = ModelsLanguage::orderBy('name', 'asc')->get();
        $this->languages = $availableLanguages;
    }

    public function render()
    {
        return view('livewire.language');
    }

    public function selectLanguage()
    {
        alert('HEY');
    }
}
