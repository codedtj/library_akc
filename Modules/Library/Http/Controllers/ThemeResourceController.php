<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\Library\Http\Controllers;


use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Library\Models\Grade;
use Modules\Library\Models\Theme;

class ThemeResourceController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('ThemeResource/Index', [
            'themes' => Theme::all()
        ]);
    }

    public function show(Theme $theme)
    {
        $pagination = $theme->resources()->simplePaginate(30);

        if (request()->expectsJson())
            return $pagination;
        else
            return Inertia::render('ThemeResource/Show', [
                'pagination' => $pagination,
                'theme' => $theme
            ]);
    }
}
