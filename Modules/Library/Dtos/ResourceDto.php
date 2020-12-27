<?php


namespace Modules\Library\Dtos;


use Illuminate\Http\UploadedFile;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class ResourceDto extends FlexibleDataTransferObject
{
    public string $title;

    public string $description;

    public string $author;

    public string $year;

    public bool $is_public;

    public UploadedFile $file;

    public UploadedFile $cover;
}
