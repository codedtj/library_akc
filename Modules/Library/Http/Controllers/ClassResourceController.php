<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\Library\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;
use Modules\Library\Models\Resource;

class ClassResourceController extends Controller
{
    public function index()
    {
        return Inertia::render('ClassResource/Index');
    }

    public function show($class)
    {
        $tagName = 'Класс ' . $class;
        $pagination = Resource::whereHas('tags', function (Builder $query) use ($tagName) {
            $query->where('name', $tagName);
        })->simplePaginate(30);

        if (request()->expectsJson())
            return $pagination;
        else
            return Inertia::render('ClassResource/Show', [
                'pagination' => $pagination,
                'classId' => $class
            ]);
    }
}
