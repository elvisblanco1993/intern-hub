<?php

namespace App\Http\Livewire\Website\Opportunity;

use Livewire\Component;
use App\Models\Opportunity;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $query = '';

    public function render()
    {                                                                                          
        return view('livewire.website.opportunity.index', [
            'opportunities' => Opportunity::where('title', 'like', '%' . $this->query . '%')->get(),
        ])->layout('layouts.guest');
    }
}
