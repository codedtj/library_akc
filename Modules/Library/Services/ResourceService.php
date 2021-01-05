<?php


namespace Modules\Library\Services;


use Modules\FileManager\Libs\DirectoryProviders\FileTypeDirectoryProvider;
use Modules\FileManager\Models\BaseFile;
use Modules\FileManager\Services\UploadedFileService;
use Modules\ImageGallery\Services\ImageService;
use Modules\Library\Dtos\ResourceDto;
use Modules\Library\Models\Resource;
use Modules\TagManager\Models\Tag;
use Modules\TagManager\Services\TagService;

class ResourceService
{

    public UploadedFileService $fileService;
    public ImageService $imageService;
    public TagService $tagService;

    public function __construct(UploadedFileService $fileService, ImageService $imageService, TagService $tagService)
    {
        $this->fileService = $fileService;
        $this->imageService = $imageService;
        $this->tagService = $tagService;
    }

    public function store(ResourceDto $data): Resource
    {
        $resource = Resource::create([
            'title' => $data->title,
            'author' => $data->author,
            'year' => $data->year,
            'description' => $data->description,
            'is_public' => $data->is_public
        ]);

        $dirProvider = new FileTypeDirectoryProvider($data->file);
        $file = $this->fileService->store($data->file, $dirProvider->getDirectory(), new BaseFile());
        $resource->file()->associate($file);

        $dirProvider->setFile($data->cover);
        $cover = $this->imageService->store($data->cover, $dirProvider);
        $resource->cover()->associate($cover);

        $resource->tags()->sync($this->tagService->storeMany($data->tags)->pluck('id'));

        $resource->save();

        return $resource;
    }
}
