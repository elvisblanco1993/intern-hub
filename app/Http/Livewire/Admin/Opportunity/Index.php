<?php

namespace App\Http\Livewire\Admin\Opportunity;

use App\Models\Opportunity;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $query = '';

    public function render()
    {
        return view('livewire.admin.opportunity.index', [
            'opportunities' => Opportunity::where('title', 'like', '%' . $this->query . '%')->paginate(10),
        ]);
    }
}
