<?php

namespace App\Http\Controllers;

use App\Models\Asociado;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.edit')->only('edit', 'update','resetpass');
    }

    public function index()
    {
        $users = User::where([['id', '<>', 1],['estado', 1]])->get();

        return view('user.index', compact('users'))
            ->with('i', 0);
    }



    public function edit(User $user)
    {
        $roles = Role::where('id', '<>', 1)->get();
        return view('user.edit', compact('user', 'roles'));
    }

    public function resetpass($id)
    {
        $user = User::find($id);
        
        $user->password = bcrypt('123456');
        $user->save();      

        return redirect()->route('users.edit', $user)
            ->with('info', 'Se aplicó la contraseña genérica');
    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('users.edit', $user)
            ->with('info', 'Se asignó los roles correctamente');
    }

    public function show()
    {
        $asociados = Asociado::where('user_id', Auth::user()->id)->get();
        $asociado = "";
        foreach ($asociados as $item) {
            $asociado = $item;
        }

        $persona = Persona::find($asociado->persona_id);
        
        return view('user.show', compact('asociado','persona'));
    }
}
