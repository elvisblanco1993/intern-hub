<?php

namespace App\Http\Livewire\Website\Opportunity;

use Livewire\Component;
use App\Models\Opportunity;
use Livewire\WitPagination;

class Index extends Component
{

    public $query = '';

    public function render()
    {
        // $opportunities = Opportunity::where('title', 'like', '%' . $query . '%')->get();
        // return view('livewire.website.opportunity.index')->layout('layouts.guest');
        $opportunities = Opportunity                                                                                                   ::get();
        return view('livewire.website.opportunity.index', [
            'opportunities' => $opportunities,
        ])->layout('layouts.guest');;
    }
}
