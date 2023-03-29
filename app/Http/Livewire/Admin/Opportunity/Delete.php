<?php

namespace App\Http\Livewire\Admin\Opportunity;

use Livewire\Component;
use App\Models\Opportunity;
use Illuminate\Support\Facades\Log;

class Delete extends Component
{
    public $modal;
    public Opportunity $opportunity;

    public function render()
    {
        return view('livewire.admin.opportunity.delete');
    }

    public function delete()
    {
        try {
            $this->opportunity->delete();
            session()->flash('flash.banner', 'Opportunity successfully removed from the system!');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th->getTrace());
            session()->flash('flash.banner', $th->getMessage());
            session()->flash('flash.bannerStyle', 'danger');
        }
        return redirect()->route('opportunities');
    }
}
