<?php

namespace App\Http\Livewire;

use App\Models\Group;
use Livewire\Component;

class CardToggle extends Component
{
  public Group $group;
  public bool $checked;

    public function render()
    {
        return view('livewire.card-toggle');
    }

    public function mount(Group $group)
    {
      $this->group = $group;
      $this->checked = auth()->user()->hasGroup($group);
    }

    public function toggleGroup()
    {
      auth()->user()->toggleGroup($this->group);
      $this->checked = !$this->checked;
    }
}
