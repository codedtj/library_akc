<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\TagManager\Http\Controllers;


use App\Http\Controllers\Controller;
use Modules\TagManager\Models\Tag;

class FilteredTagController extends Controller
{
    public function index($name)
    {
        return Tag::where('name', $name)->get();
    }
}
