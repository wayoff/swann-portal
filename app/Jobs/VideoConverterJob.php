<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Models\Video;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class VideoConverterJob extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $fileIn;
    protected $fileOut;
    protected $video;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Video $video, $fileIn, $fileOut)
    {
        $this->fileIn = $fileIn;
        $this->fileOut = $fileOut;
        $this->video = $video;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $fileOutMp4 = $this->fileOut . '.mp4';
        $fileOutOGG = $this->fileOut . '.ogg';

        \FFMPEG::convert()->input($this->fileIn)->output($fileOutOGG)->go();

        if ($this->video->extension === 'mp4') {

            //\File::move($this->fileIn, $fileOutMp4);

        } else {

            \FFMPEG::convert()->input($this->fileIn)->output($fileOutMp4)->go();
            \File::delete($this->fileIn);
            
        }

        $this->video->converted = 1;
        $this->video->save();

    }
}
