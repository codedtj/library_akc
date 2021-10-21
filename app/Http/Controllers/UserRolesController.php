<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Http\Controllers;


use App\Models\User;

class UserRolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('role');
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'roles' => 'nullable|array'
        ]);

        $user->roles()->sync($data['roles']);

        return $user->roles;
    }
}
