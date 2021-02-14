<?php

namespace Tests\Unit\Services;

use App\Http\Models\Photo;
use App\Http\Services\PhotoService;
use Config;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Mockery;
use Tests\TestCase;

class PhotoServiceTest extends TestCase
{

    private $photoService;
    private $photo;

    protected function setUp(): void
    {
        parent::setUp();
        $this->photo = Mockery::mock(Photo::class);
        $this->photoService = new PhotoService($this->photo);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     * @dataProvider providerGetAllPhoto
     * @param $genre
     */
    public function getAllPhoto($genre)
    {
        $this->photo
            ->shouldReceive('getAllPhoto')
            ->once()
            ->with($genre)
            ->andReturn(new LengthAwarePaginator([], 1, 1));

        $this->photoService->getAllPhoto($genre);
    }

    public function providerGetAllPhoto()
    {
        return [
            'ジャンルなし' => [
                'genre' => null,
            ],
            'ジャンルあり' => [
                'genre' => 1
            ],
        ];
    }

    /**
     * @test
     */
    public function uploadPhotoToS3()
    {
        Storage::fake('s3');

        $genre = 1;
        $fileName = 'fake.jpeg';
        $filePath = '/photo/testUpload';
        $expectedUniqueFileName = 'testUnique.jpeg';
        $file = UploadedFile::fake()->image($fileName);
        Config::set("const.PHOTO.GENRE_FILE_URL.$genre", $filePath);

        $this->photo
            ->shouldReceive('createPhotoInfo')
            ->once()
            ->with($fileName, $filePath, $genre)
            ->andReturn($expectedUniqueFileName);

        $uniqueFileName = $this->photoService->uploadPhotoToS3($file, $fileName, $genre);

        $this->assertSame($expectedUniqueFileName, $uniqueFileName);
        Storage::disk('s3')->assertExists("$filePath/$expectedUniqueFileName");
    }

    /**
     * @test
     */
    public function deletePhotoFromS3()
    {
        Storage::fake('s3');

        $genre = 1;
        $fileName = 'fake.jpeg';
        $filePath = '/photo/testDelete';
        $expectedUniqueFileName = 'testUnique.jpeg';
        Config::set("const.PHOTO.GENRE_FILE_URL.$genre", $filePath);
        $file = UploadedFile::fake()->image($fileName);

        Storage::disk('s3')->putFileAs($filePath, $file, $expectedUniqueFileName, 'public');

        $this->photo
            ->shouldReceive('deletePhotoInfo')
            ->once()
            ->with($expectedUniqueFileName);

        $this->photoService->deletePhotoFromS3($expectedUniqueFileName, $genre);

        Storage::disk('s3')->assertMissing("$filePath/$expectedUniqueFileName");
    }


}
