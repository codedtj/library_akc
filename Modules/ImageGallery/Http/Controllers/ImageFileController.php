<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\ImageGallery\Http\Controllers;


use App\Http\Controllers\Controller;
use Modules\ImageGallery\Services\ImageService;

class ImageFileController extends Controller
{
    private ImageService $service;

    public function __construct(ImageService $service)
    {
        $this->service = $service;
    }

    public function show($image)
    {
        $options = null;
        if (request()->get('width') || request()->get('height'))
            $options = collect([
                request()->get('resize') ?? 'resize' => [
                    'width' => request()->get('width'),
                    'height' => request()->get('height')
                ]
            ]);
        return $this->service->show($image, $options, true);
    }
}
