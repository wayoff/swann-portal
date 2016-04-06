<?php
namespace App\SwannPortal;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Jobs\VideoConverterJob;

class VideoUpload
{
    protected $id;
    protected $videos;
    protected $request;

    public $destination = null;

    function __construct(Request $request, Video $videos, $id = false)
    {
        $this->id = $id;
        $this->videos = $videos;
        $this->request = $request;

        $this->destination = public_path() . config('swannportal.path.temp');
    }

    public function handle()
    {
        if(!$this->request->hasFile('video'))
        {
            if ($this->id) {
                $video = $this->videos->findOrFail($this->id);
                $video->update([
                    'title'       => $this->request->input('video_title'),
                    'description' => $this->request->input('video_description'),
                    'featured'    => $this->request->input('video_featured')
                ]);

                return $video;
            }

            return null;
        }

        $extension = $this->request->file('video')->getClientOriginalExtension();
        $fileName = date('YmdHis') . str_random(20);
        $file = $fileName . '.' . $extension;

        $fileIn  = $this->destination . $file;
        $fileOut = public_path() . config('swannportal.path.videos') . $fileName;

        $this->request->file('video')->move($this->destination, $file);

        if ($this->id) {
            $video = $this->videos->findOrFail($this->id);

            \File::delete(public_path() . config('swannportal.path.videos') . $video->name . '.' . 'mp4');
            \File::delete(public_path() . config('swannportal.path.videos') . $video->name . '.' . 'ogg');

            $video->update([
                'title'       => $this->request->input('video_title'),
                'description' => $this->request->input('video_description'),
                'featured'    => $this->request->input('video_featured'),
                'name'        => $fileName,
                'extension'   => $extension,
                'converted'   => 0
            ]);

        } else {
            $video = $this->videos->create([
                'title'       => $this->request->input('video_title'),
                'description' => $this->request->input('video_description'),
                'featured'    => $this->request->input('video_featured')?: 0,
                'name'        => $fileName,
                'extension'   => $extension,
                'converted'   => 0
            ]);
        }

        dispatch((new VideoConverterJob($video, $fileIn, $fileOut))->delay(30));

        return $video;
    }
}