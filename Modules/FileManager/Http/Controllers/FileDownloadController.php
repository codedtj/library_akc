<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\FileManager\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\FileManager\Models\BaseFile;
use Modules\FileManager\Services\FileDownloadService;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileDownloadController extends Controller
{
    public FileDownloadService $service;

    public function __construct(FileDownloadService $service)
    {
        $this->service = $service;
    }

    public function download(BaseFile $file): StreamedResponse
    {
        Storage::
        $path = Storage::disk('local')-($file->path);
        return $this->service->download($path);
    }
}
