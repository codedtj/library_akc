<?php


namespace Modules\Library\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Library\Dtos\ResourceDto;
use Modules\Library\Http\Requests\CreateResourceRequest;
use Modules\Library\Http\Requests\UpdateResourceRequest;
use Modules\Library\Models\Category;
use Modules\Library\Models\Grade;
use Modules\Library\Models\Resource;
use Modules\Library\Models\Role;
use Modules\Library\Models\Theme;
use Modules\Library\Services\ResourceService;

class ResourceController extends Controller
{

    private ResourceService $service;

    public function __construct(ResourceService $service)
    {
        $this->service = $service;
        $public = ['index', 'show', 'download'];
        $this->middleware('auth')->except($public);
        $this->authorizeResource(Resource::class, 'resource');
    }

    public function index(): Response
    {
        $pagination = Resource::latest()->simplePaginate(30);
        if (request()->expectsJson())
            return $pagination;
        else
            return Inertia::render('Resource/Index', [
                'pagination' => $pagination
            ]);
    }

    public function show(Resource $resource): Response
    {
        $resource->increment('views');

        return Inertia::render('Resource/ShowResource', [
            'resource' => $resource->append(['is_editable', 'is_favourite'])
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Resource/ResourceEditor', [
            'categories' => Category::all(),
            'themes' => Theme::all(),
            'roles' => Role::public()->get(),
            'grades' => Grade::all()
        ]);
    }

    public function store(CreateResourceRequest $request): RedirectResponse
    {
        $resource = $this->service->store(new ResourceDto($request->validated()));
        return Redirect::route('resources.show', $resource);
    }

    public function edit(Resource $resource): Response
    {
        $resource->load(['roles', 'grades']);
        return Inertia::render('Resource/ResourceEditor', [
            'categories' => Category::all(),
            'themes' => Theme::all(),
            'roles' => Role::public()->get(),
            'resource' => $resource,
            'grades' => Grade::all()
        ]);
    }

    public function update(Resource $resource, UpdateResourceRequest $request): RedirectResponse
    {
        $resource = $this->service->edit($resource, new ResourceDto($request->validated()));
        return Redirect::route('resources.show', $resource);
    }

    public function destroy(Resource $resource): RedirectResponse
    {
        $this->service->destroy($resource);
        return Redirect::route('resources.index');
    }

    public function download(Resource $resource): RedirectResponse
    {
        $resource->increment('downloads');
        return Redirect::route('files.download', $resource->file_id);
    }
}
