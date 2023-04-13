<?php

namespace App\Http\Livewire\Admin\Opportunity;

use Livewire\Component;
use App\Models\Opportunity;
use Illuminate\Support\Facades\Log;

class Create extends Component
{
    public $modal;
    public $title, $location, $url, $salary, $category, $custom_category;

    public function render()
    {
        return view('livewire.admin.opportunity.create');
    }

    public function save()
    {
        // Validate required fields
        $this->validate([
            'title' => 'required',
            'location' => 'required',
            'url' => 'required|active_url',
            'category' => 'required'
        ]);

        // Try to create opportunity.
        try {
            Opportunity::create([
                'team_id' => auth()->user()->currentTeam->id,
                'title' => $this->title,
                'slug' => str($this->title)->slug(),
                'location' => $this->location,
                'salary' => $this->salary,
                'url' => $this->url,
                'category' => ($this->category == 'Other') ? $this->custom_category : $this->category,
            ]);
            session()->flash('flash.banner', 'Opportunity successfully posted!');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            //Log error (if any)
            Log::error($th->getTrace());
            session()->flash('flash.banner', $th->getMessage());
            session()->flash('flash.bannerStyle', 'danger');
        }

        // Return to dashboard
        return redirect()->route('opportunities');
    }
}
