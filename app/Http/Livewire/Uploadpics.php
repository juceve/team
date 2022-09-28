<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Uploadpics extends Component
{
    use WithFileUploads;

    public $photo;

    public function render()
    {
        return view('livewire.uploadpics');
    }

    public function save()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);
        
        $this->photo->storeAs('avatar',Auth::user()->id . '.' . $this->photo->getClientOriginalExtension());

        $user = User::find(Auth::user()->id);
        $user->avatar = 'avatar/' . Auth::user()->id . '.' . $this->photo->getClientOriginalExtension();
        $user->update();

        return redirect()->route('profile')
                            ->with('success', 'Avatar actualizado correctamente');
    }
}
