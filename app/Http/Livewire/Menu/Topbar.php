<?php

namespace App\Http\Livewire\Menu;

use Livewire\Component;
use App\Http\Livewire\SideMenu;

class Topbar extends Component
{   
    public $open = true;

    public function menu(){
        if ($this->open) {
            $this->open = false;
        } else {
            $this->reset('open');
        }
        $this->emitTo(SideMenu::class, 'menuButton');
    }

    public function render()
    {
        return view('livewire.menu.topbar');
    }
}
