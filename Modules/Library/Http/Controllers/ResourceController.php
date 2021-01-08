<?php


namespace Modules\Library\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Library\Dtos\ResourceDto;
use Modules\Library\Http\Requests\CreateResourceRequest;
use Modules\Library\Http\Requests\EditResourceRequest;
use Modules\Library\Models\Category;
use Modules\Library\Models\Resource;
use Modules\Library\Services\ResourceService;

class ResourceController extends Controller
{

    private ResourceService $service;

    public function __construct(ResourceService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return Inertia::render('Resource/Index', [
            'pagination' => Resource::latest()->simplePaginate(20)
        ]);
    }

    public function show($resource)
    {
        return Inertia::render('Resource/ShowResource', [
            'resource' => Resource::withoutGlobalScope('public')->with(['tags', 'category'])->findOrFail($resource)
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Resource/ResourceEditor', [
            'categories' => Category::all()
        ]);
    }

    public function store(CreateResourceRequest $request)
    {
        $resource = $this->service->store(new ResourceDto($request->validated()));
        return Redirect::route('resources.show', $resource);
    }

    public function edit(Resource $resource)
    {
        return Inertia::render('Resource/ResourceEditor', [
            'categories' => Category::all(),
            'resource' => $resource
        ]);
    }

    public function update(Resource $resource, EditResourceRequest $request)
    {
        $resource = $this->service->edit($resource, new ResourceDto($request->validated()));
        return Redirect::route('resources.show', $resource);
    }
}
