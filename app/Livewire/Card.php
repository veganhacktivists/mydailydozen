<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Group;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Card extends Component
{
    public Group $group;

    public $checkCount;
    public array $checkboxes = [];

    private function updateCheckboxes()
    {
        $this->checkboxes = [...array_fill(0, $this->checkCount, true), ...array_fill(0, $this->group->per_day - $this->checkCount, false)];
    }

    public function mount(Group $group)
    {
        $this->group = $group;
        $this->checkCount = Auth::user()->getCheckCountForGroupAndDate($this->group, Carbon::today());
        $this->updateCheckboxes();
    }

    public function render()
    {
        return view('livewire.card');
    }

    public function check($count)
    {
        $update = Auth::user()->setCheckCountForGroupAndDate($this->group, Carbon::today(), $count);
        $this->checkCount = $update;
        $this->updateCheckboxes();
    }
}
