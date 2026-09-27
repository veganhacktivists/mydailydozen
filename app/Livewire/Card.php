<?php

namespace App\Livewire;

use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Card extends Component
{
    public Group $group;

    public $checkCount;
    public array $checkboxes = [];
    #[Locked]
    public string $date;

    #[Locked]
    public ?string $timezone = null;

    private function updateCheckboxes()
    {
        $checked = min($this->checkCount, $this->group->per_day);
        $this->checkboxes = [
            ...array_fill(0, $checked, true),
            ...array_fill(0, max(0, $this->group->per_day - $checked), false),
        ];
    }

    public function mount(Group $group, ?int $checkCount = null)
    {
        $this->group = $group;
        $this->date = Auth::user()->today()->toDateString();
        $this->timezone = Auth::user()->timezone;
        // The dashboard batches today's pivot counts and passes them in to avoid an
        // N+1 query per card; fall back to a lookup when the count isn't provided.
        $this->checkCount = $checkCount ?? Auth::user()->getCheckCountForGroupAndDate($this->group, Auth::user()->today());
        $this->updateCheckboxes();
    }

    public function render()
    {
        return view('livewire.card');
    }

    public function check($count)
    {
        if ($this->timezone !== Auth::user()->timezone || $this->date !== Auth::user()->today()->toDateString()) {
            $this->redirectRoute('groups.index');

            return;
        }

        $update = Auth::user()->setCheckCountForGroupAndDate($this->group, Auth::user()->today(), $count);
        $this->checkCount = $update;
        $this->updateCheckboxes();
        $this->dispatch('serving-checked', group: $this->group->id, count: $update);
    }
}
