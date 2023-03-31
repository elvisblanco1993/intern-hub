<?php

namespace App\Http\Livewire\Admin\Opportunity;

use Livewire\Component;
use App\Models\Opportunity;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    public $query = '';

    public function render()
    {
        $opportunities = Auth::user()->currentTeam->opportunities();
        return view('livewire.admin.opportunity.index', [
            'opportunities' => $opportunities->where('title', 'like', '%' . $this->query . '%')->get(),
        ]);
    }
}
