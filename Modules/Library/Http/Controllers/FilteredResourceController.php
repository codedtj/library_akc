<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\Library\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Modules\Library\Models\Resource;

class FilteredResourceController extends Controller
{
    public function index()
    {
        $query = Resource::query();

        if (request('title'))
            $query->where('title', 'like', '%' . request('title') . '%');
        if (request('author'))
            $query->where('author', 'like', '%' . request('author') . '%');
        if (request('year'))
            $query->where('year', 'like', '%' . request('year') . '%');
        if (request('type'))
            $query->where('type', 'like', request('type'));
        if (request('language'))
            $query->where('language', 'like', request('language'));
        if (request('level'))
            $query->where('level', 'like', request('level'));
        if (request('description'))
            $query->where('description', 'like', '%' . request('description') . '%');
        if (request('tags')){
            $tags = explode(',', request('tags'));

            foreach($tags as $tag){
                $query->whereHas('tags', function (Builder $query) use ($tag) {
                    $query->where('tags.id',$tag);
                });
            }
        }

        if (request('category'))
            $query->whereHas('category', function (Builder $query) {
                $query->where('id', request('category'));
            });
        if (request('theme'))
            $query->whereHas('theme', function (Builder $query) {
                $query->where('id', request('theme'));
            });
        if (request('grade'))
            $query->whereHas('grades', function (Builder $query) {
                $query->where('grades.id', request('grade'));
            });
        if (request('role'))
            $query->whereHas('roles', function (Builder $query) {
                $query->where('roles.id', request('role'));
            });

        return $query->latest()->paginate(50);
    }
}
