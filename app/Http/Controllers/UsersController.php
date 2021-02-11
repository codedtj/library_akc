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
        $this->middleware('role');
    }

    public function index()
    {
        $pagination = User::latest()->with('roles')->simplePaginate(50);
        if (request()->expectsJson())
            return $pagination;
        else
            return Inertia::render('User/Index', [
                'pagination' => $pagination,
                'roles' => Role::all()
            ]);
    }
}
