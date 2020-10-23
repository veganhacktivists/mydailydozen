<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Group;
use Carbon\Carbon;

class Card extends Component
{
    public Group $group;
    public $checkCount;

    public function mount(Group $group)
    {
      $this->group = $group;
      $this->checkCount = auth()->user()->getCheckCountForGroupAndDate($this->group, Carbon::today());
    }
    public function render()
    {
        return view('livewire.card');
    }

    public function check()
    {
      $update = auth()->user()->incrementCheckCountForGroupAndDate($this->group, Carbon::today());
      $this->checkCount = $update;
    }

    public function uncheck()
    {
      $update = auth()->user()->decrementCheckCountForGroupAndDate($this->group, Carbon::today());
      $this->checkCount = $update;
    }

}
