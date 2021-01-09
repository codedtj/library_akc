<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\Library\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;
use Modules\Library\Models\Resource;

class SearchController extends Controller
{
    public function index($query)
    {
        $q = '%' . $query . '%';
        $resources = Resource::where('title', 'like', $q)
            ->orWhere('author', 'like', $q)
            ->orWhere('year', 'like', $q)
            ->orWhereHas('tags', function (Builder $query) use ($q) {
                $query->where('name', 'like', $q);
            })->simplePaginate(30);

        if (request()->expectsJson())
            return $resources;
        else
            return Inertia::render('Search/Index', [
                'query' => $query,
                'pagination' => $resources
            ]);
    }
}
