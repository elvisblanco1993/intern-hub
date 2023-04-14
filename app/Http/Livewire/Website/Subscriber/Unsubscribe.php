<?php

namespace App\Http\Livewire\Website\Subscriber;

use Livewire\Component;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Log;

class Unsubscribe extends Component
{
    public $subscriber, $email;

    public function mount($email)
    {
        $this->email = $email;
        $this->subscriber = Subscriber::where('email', $email)->first();
    }

    public function render()
    {
        return view('livewire.website.subscriber.unsubscribe')->layout('layouts.guest');
    }

    public function unsubscribe()
    {
        try {
            $this->subscriber->categories()->detach();
            $this->subscriber->delete();

            session()->flash('message', 'You have successfully subscribed!');
            session()->flash('style', 'success');
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('message', 'We ran into an error. Please try again later.');
            session()->flash('style', 'error');
        }
        return redirect()->route('unsubscribe', ['email' => $this->email]);
    }
}
