<?php

namespace App\Http\Livewire\Website\Opportunity;

use App\Models\Category;
use Livewire\Component;
use App\Models\Opportunity;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $query = '', $category = '';

    public function render()
    {
        return view('livewire.website.opportunity.index', [
            'opportunities' => ($this->category)
                ? Category::findorfail($this->category)->opportunities()->where('title', 'like', '%' . $this->query . '%')->orderBy('created_at', 'DESC')->get()
                : Opportunity::where('title', 'like', '%' . $this->query . '%')->orderBy('created_at', 'DESC')->get(),
        ])->layout('layouts.guest');
    }
}
