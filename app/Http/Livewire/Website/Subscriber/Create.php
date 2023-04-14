<?php

namespace App\Http\Livewire\Website\Subscriber;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Log;

class Create extends Component
{
    public $modal, $name, $email, $categories = [];

    public function render()
    {
        return view('livewire.website.subscriber.create');
    }

    public function save()
    {

        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if (count($this->categories) > 0) {
            try {
                $subscriber = Subscriber::create([
                    'name' => $this->name,
                    'email' => $this->email,
                ]);

                foreach ($this->categories as $key => $category) {
                    $subscriber->categories()->attach($category);
                }

                session()->flash('message', 'You have successfully subscribed!');
                session()->flash('style', 'success');
            } catch (\Throwable $th) {
                Log::error($th);
                session()->flash('message', 'We ran into an error. Please try again later.');
                session()->flash('style', 'error');
            }
        }

        return redirect()->route('all-opportunities');
    }
}
