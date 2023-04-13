<?php

namespace App\Http\Livewire\Website\Subscriber;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Log;

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
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $category = Category::where('name', $this->category)->first();

        if ($category->exists()) {
            try {
                $subscriber = Subscriber::create([
                    'name' => $this->name,
                    'email' => $this->email,
                ]);
                $subscriber->categories()->attach($category->id);

                session()->flash('message', 'You have successfully subscribed to ' . $this->category);
                session()->flash('style', 'success');
            } catch (\Throwable $th) {
                Log::error($th);
                session()->flash('message', 'We ran into an error. Please try again later.');
                session()->flash('style', 'error');
            }
        }

        return redirect()->route('home');
    }
}
