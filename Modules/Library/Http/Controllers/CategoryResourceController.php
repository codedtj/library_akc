<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\Library\Http\Controllers;


use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Modules\Library\Models\Category;

class CategoryResourceController extends Controller
{
    public function index()
    {
        return Inertia::render('CategoryResource/Index', [
            'categories' => Category::all()
        ]);
    }

    public function show(Category $category)
    {
        $pagination = $category->resources()->simplePaginate(30);

        if (request()->expectsJson())
            return $pagination;
        else
            return Inertia::render('CategoryResource/Show', [
                'pagination' => $pagination,
                'category' => $category
            ]);
    }
}
