<?php
namespace App\SwannPortal;

use App\Models\Photo;
use Illuminate\Http\Request;

class FileUpload
{
    protected $request;
    protected $photos;

    public $destination = null;

    function __construct(Request $request, Photo $photos)
    {
        $this->request = $request;
        $this->photos = $photos;

        $this->destination = public_path() . '/uploads';
    }

    public function handle()
    {
        $extension = $this->request->file('image')->getClientOriginalExtension();
        $fileName = str_random(40);

        $this->request->file('image')->move($this->destination, $fileName . '.' . $extension);

        $photo = $this->photos->create([
            'name'      => $extension,
            'extension' => $fileName
        ]);

        return $photo;
    }
}