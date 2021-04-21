<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\FileManager\Http\Controllers;


use App\Http\Controllers\Controller;
use Modules\FileManager\Http\Responses\FileResponse;
use Modules\FileManager\Models\BaseFile;

class FileViewController extends Controller
{
    public function show(BaseFile $file)
    {
        $response = new FileResponse($file->getPath(), $file->getMimeType());
        return $response->generateResponse();
    }
}
