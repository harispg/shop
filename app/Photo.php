<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;

class Photo extends Model
{

	protected $baseDir = 'Images/Articles';
	protected $guarded = [];



    public function articles()
    {
    	return $this->belongsToMany(Article::class);
    }

    /**
     * [makePhotosFromFiles makes photos from uploaded files]
     * @param  [array] $files [UploadedFile file]
     * @return [array]        [App\Photo::class->id]
     */
    public static function makePhotosFromFiles($files){

    	foreach ($files as $file) {
            $photo = static::savePhoto($file);
            $photos[] = $photo->id;
    	}

    	return $photos;
    }

    public static function savePhoto($file){

        $photo = new Photo;
        $photo->name=time() . $file->getClientOriginalName();
        $photo->path = $photo->baseDir . '/' . $photo->name;
        $photo->thumbnail_path = $photo->baseDir . '/tn-' . $photo->name;
        $photo->thumbnail_small = $photo->baseDir . '/sm-' . $photo->name;
        $file->move($photo->baseDir, $photo->name);

        Image::make($photo->path)->fit(200,200)->save($photo->thumbnail_small);
        Image::make($photo->path)->fit(480,700)->save($photo->thumbnail_path);
        $photo->save();
        return $photo;
    }
}
