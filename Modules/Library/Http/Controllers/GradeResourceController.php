<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\Library\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;
use Modules\Library\Models\Grade;
use Modules\Library\Models\Resource;

class GradeResourceController extends Controller
{
    public function index()
    {
        return Inertia::render('GradeResource/Index', [
            'grades' => Grade::all()
        ]);
    }

    public function show(Grade $grade)
    {

        $pagination = $grade->resources()->simplePaginate(30);

        if (request()->expectsJson())
            return $pagination;
        else
            return Inertia::render('GradeResource/Show', [
                'pagination' => $pagination,
                'grade' => $grade
            ]);
    }
}
