<?php

namespace App\Http\Livewire\Website\Subscriber;

use Livewire\Component;

class Create extends Component
{
    public $modal, $name, $email, $category;

    public function mount($category)
    {
        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.website.subscriber.create');
    }

    public function save()
    {
        dd([
            $this->name,
            $this->email,
            $this->category,
        ]);
    }
}
