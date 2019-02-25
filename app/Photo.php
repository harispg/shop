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
            $photo = new Photo;
    		$photo->name=time() . $file->getClientOriginalName();
	        $photo->path = $photo->baseDir . '/' . $photo->name;
	        $photo->thumbnail_path = $photo->baseDir . '/tn-' . $photo->name;
	        $file->move($photo->baseDir, $photo->name);

	    	Image::make($photo->path)->fit(200)->save($photo->thumbnail_path);
            $photo->save();
	    	$photos[] = $photo->id;
    	}

    	return $photos;
    }
}
