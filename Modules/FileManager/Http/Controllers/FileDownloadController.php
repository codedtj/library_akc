<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\FileManager\Http\Controllers;


use App\Http\Controllers\Controller;
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
        return $this->service->download($file);
    }
}
