<?php


namespace Modules\Library\Dtos;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class ResourceDto extends FlexibleDataTransferObject
{
    public ?string $id;

    public string $title;

    public ?string $description;

    public string $author;

    public ?string $year;

    public string $type;

    public string $language;

    public bool $is_public;

    public string $category_id;

    public string $theme_id;

    public Collection $tags;

    public Collection $roles;

    public Collection $grades;

    public ?UploadedFile $file;

    public ?UploadedFile $cover;

    public function __construct(array $parameters = [])
    {
        $parameters['is_public'] = (bool)$parameters['is_public'];

        $parameters['tags'] = collect($parameters['tags']);

        $parameters['roles'] = collect($parameters['roles']);

        $parameters['grades'] = collect($parameters['grades']);

        parent::__construct($parameters);
    }
}
