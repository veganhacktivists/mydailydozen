<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Group;
use Carbon\Carbon;

class Card extends Component
{
    public Group $group;
    public $checkCount;
    public $checkboxes = [];

    public function mount(Group $group)
    {
        $this->group = $group;
        $this->checkCount = auth()->user()->getCheckCountForGroupAndDate($this->group, Carbon::today());
        $this->checkboxes = [...array_fill(0, $this->checkCount, true), ...array_fill(0, $group->per_day-$this->checkCount, false)];
    }
    public function render()
    {
        return view('livewire.card');
    }

    public function check($count)
    {
        $update = auth()->user()->setCheckCountForGroupAndDate($this->group, Carbon::today(), $count);
        $this->checkCount = $update;
        $this->checkboxes = [...array_fill(0, $this->checkCount, true), ...array_fill(0, $this->group->per_day-$this->checkCount, false)];
    }
}
