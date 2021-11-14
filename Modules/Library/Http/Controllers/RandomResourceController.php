<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\Library\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\FileManager\Models\BaseFile;
use Modules\Library\Models\Resource;

class RandomResourceController extends Controller
{
    public function getAny()
    {
        $resource = Resource::inRandomOrder()->first();

        return redirect(route('resources.show', $resource->id));
    }

    public function getAnyVideo()
    {
        $file = BaseFile::where('mime_type', 'like', 'video%')->inRandomOrder()->first();

        $resource = Resource::where('file_id', $file->id)->first();

        return redirect(route('resources.open', $resource->id));
    }
}
