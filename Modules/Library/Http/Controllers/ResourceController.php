<?php


namespace Modules\Library\Http\Controllers;


use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ResourceController extends Controller
{
    public function create()
    {
        return Inertia::render('Resource/ResourceEditor');
    }
}
