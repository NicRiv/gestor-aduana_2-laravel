<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SideMenu extends Component
{

    public $open_sidebar = true;

    // Escucha el emit de Topbar
    protected $listeners = ['menuButton'];

    public function menuButton(){
        if ($this->open_sidebar) {
            $this->open_sidebar = false;
        } else {
            $this->reset('open_sidebar');
        }
    }

    public function render()
    {
        return view('livewire.side-menu');
    }
}
