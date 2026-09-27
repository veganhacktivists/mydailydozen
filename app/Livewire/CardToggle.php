<?php

namespace App\Livewire;

use App\Models\Group;
use Livewire\Component;

class CardToggle extends Component
{
    public $group;
    public $checked;

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
        // Acts on what this tab shows, then shows what's saved, in case another tab changed it
        $groups = auth()->user()->currentGroups();
        $this->checked ? $groups->detach($this->group->id) : $groups->syncWithoutDetaching([$this->group->id]);
        $this->checked = $groups->whereKey($this->group->id)->exists();
    }
}
