<?php

namespace Tests\Unit\Models;

use App\Http\Models\Photo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PhotoTest extends TestCase
{

    use RefreshDatabase;

    private $photo;
    public $mockConsoleOutput = false;

    protected function setUp(): void
    {
        parent::setUp();

        $this->photo = new Photo([]);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getAllPhoto()
    {
        factory(Photo::class)->create([
            'genre' => 1,
        ]);
        factory(Photo::class, 2)->create([
            'genre' => 2,
        ]);
        factory(Photo::class, 3)->create([
            'genre' => 3,
        ]);

        //ジャンルなし
        $records = $this->photo->getAllPhoto(null);
        $this->assertSame(6, count($records->items()));

        //ジャンル１
        $recordsOfGenre1 = $this->photo->getAllPhoto(1);
        $this->assertSame(1, count($recordsOfGenre1->items()));

        //ジャンル２
        $recordsOfGenre2 = $this->photo->getAllPhoto(2);
        $this->assertSame(2, count($recordsOfGenre2->items()));

        //ジャンル３
        $recordsOfGenre3 = $this->photo->getAllPhoto(3);
        $this->assertSame(3, count($recordsOfGenre3->items()));
    }

    /**
     * @test
     */
    public function createPhotoInfo()
    {
        $uniqueFileName = $this->photo->createPhotoInfo('test.jpeg', '/photo', 1);
        $fileName = explode('.', $uniqueFileName)[1];

        $record = Photo::query()->where('genre', 1)->get();

        $this->assertSame(1, count($record));
        $this->assertTrue(isset($uniqueFileName));
        $this->assertSame('test', $fileName);
    }

    /**
     * @test
     */
    public function deletePhotoInfo()
    {
        $id = 'abcdefghiasw';
        $fileName = 'abcdefghiasw.test.jpeg';
        factory(Photo::class)->create([
            'id' => $id,
            'file_name' => 'test.jpeg',
            'genre' => 1,
        ]);
        factory(Photo::class)->create([
            'id' => 'abcdefghijkl',
            'file_name' => 'test2.jpeg',
            'genre' => 2,
        ]);

        $this->photo->deletePhotoInfo($fileName);

        $recordNull = Photo::query()->where('id', $id)->get();

        $record = Photo::query()->where('id', 'abcdefghijkl')->get();

        $this->assertSame(0, count($recordNull));
        $this->assertSame(1, count($record));
    }
}
