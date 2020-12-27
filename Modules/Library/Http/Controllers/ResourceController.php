<?php


namespace Modules\Library\Http\Controllers;


use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Modules\Library\Dtos\ResourceDto;
use Modules\Library\Http\Requests\CreateResourceRequest;
use Modules\Library\Services\ResourceService;

class ResourceController extends Controller
{

    private ResourceService $service;

    public function __construct(ResourceService $service)
    {
        $this->service = $service;
    }

    public function create()
    {
        return Inertia::render('Resource/ResourceEditor');
    }

    public function store(CreateResourceRequest $request){
        dd(2);
        $this->service->store(new ResourceDto($request->validated()));
    }
}
