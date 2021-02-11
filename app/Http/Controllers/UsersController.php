<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Http\Controllers;


use App\Models\User;
use Inertia\Inertia;
use Modules\Library\Models\Role;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }

    public function index()
    {
        $query = User::latest()->with('roles');
        if (request('name'))
            $query->Where('name', 'like', '%' . request('name') . '%');
        if (request('email'))
            $query->Where('email', 'like', '%' . request('email') . '%');
        $pagination = $query->simplePaginate(25);
        if (request()->expectsJson())
            return $pagination;
        else
            return Inertia::render('User/Index', [
                'pagination' => $pagination,
                'roles' => Role::all()
            ]);
    }
}
