<?php

namespace App\Livewire;

use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Renderless;
use Livewire\Component;

class Card extends Component
{
    public Group $group;

    public $checkCount;

    #[Locked]
    public string $date;

    #[Locked]
    public ?string $timezone = null;

    public function mount(Group $group, ?int $checkCount = null)
    {
        $this->group = $group;
        $this->date = Auth::user()->today()->toDateString();
        $this->timezone = Auth::user()->timezone;
        $this->checkCount = max(0, min($checkCount ?? Auth::user()->getCheckCountForGroupAndDate($this->group, Auth::user()->today()), $this->group->per_day));
    }

    public function render()
    {
        return view('livewire.card');
    }

    // The card shows the tick straight away, so nothing needs re-rendering
    #[Renderless]
    public function check($count): ?int
    {
        $stale = $this->timezone !== Auth::user()->timezone
            || $this->date !== Auth::user()->today()->toDateString()
            || ! Auth::user()->currentGroups()->whereKey($this->group->id)->exists();

        if ($stale) {
            $this->redirectRoute('groups.index');

            return null;
        }

        $this->checkCount = Auth::user()->setCheckCountForGroupAndDate($this->group, Auth::user()->today(), $count);
        $this->dispatch('serving-checked', group: $this->group->id, count: $this->checkCount);

        return $this->checkCount;
    }
}
