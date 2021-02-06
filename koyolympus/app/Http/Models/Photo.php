<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    protected $guarded = [];
    protected $appends = [
        'url',
    ];
    protected $visible = [
        'id',
        'genre',
        'url',
    ];
    protected $perPage = 9;
    protected $keyType = 'string';
    const ID_LENGTH = 12;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if (!Arr::get($this->attributes, 'id')) {
            $this->setId();
        }
    }

    public function setId()
    {
        $this->attributes['id'] = $this->getRandomId();
    }

    public function getRandomId(): string
    {
        $characters = array_merge(
            range(0, 9), range('a', 'z'),
            range('A', 'Z'), ['-', '_']
        );

        $length = count($characters);

        $id = "";

        for ($i = 0; $i < self::ID_LENGTH; $i++) {
            $id .= $characters[random_int(0, $length - 1)];
        }

        return $id;
    }

    public function getUrlAttribute()
    {
        return Storage::disk('s3')->url($this->attributes['file_path']);
    }

    public function getAllPhoto()
    {
        return Photo::query()
            ->orderBy('created_at', 'desc')->paginate();
    }

    public function createPhotoInfo(string $fileName, string $filePath, int $genre): string
    {
        $photo = new Photo();

        $uniqueFileName = $photo->id . '.' . $fileName;

        $uniqueFilePath = $filePath . '/' . $uniqueFileName;

        $photo->fill([
            'file_name' => $uniqueFileName,
            'file_path' => $uniqueFilePath,
            'genre' => $genre,
        ]);

        $photo->save();

        return $uniqueFileName;
    }

    public function deletePhotoInfo(string $fileName, string $filePath, int $genre)
    {
        $fileIdAndName = explode('.', $fileName);

        self::query()
            ->where('id', $fileIdAndName[0])
            ->delete();
    }
}
