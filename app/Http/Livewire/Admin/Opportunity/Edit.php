<?php

namespace App\Http\Livewire\Admin\Opportunity;

use App\Models\Opportunity;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Edit extends Component
{
    public $modal;
    public $title, $location, $url, $salary, $categories = [];
    public Opportunity $opportunity;

    public function mount()
    {
        $this->title = $this->opportunity->title;
        $this->location = $this->opportunity->location;
        $this->url = $this->opportunity->url;
        $this->salary = $this->opportunity->salary;
    }

    public function render()
    {
        return view('livewire.admin.opportunity.edit');
    }

    public function save()
    {
        // Validate required fields
        $this->validate([
            'title' => 'required',
            'location' => 'required',
            'url' => 'required|active_url',
            'categories' => 'required'
        ]);

        // Try to create opportunity.
        try {
            $this->opportunity->update([
                'title' => $this->title,
                'slug' => str($this->title)->slug(),
                'location' => $this->location,
                'url' => $this->url,
                'salary' => $this->salary,
            ]);

            $this->opportunity->categories()->detach();

            foreach ($this->categories as $key => $category) {
                $this->opportunity->categories()->attach($category);
            }

            session()->flash('flash.banner', 'Opportunity successfully updated!');
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
