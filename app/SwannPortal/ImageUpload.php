<?php
namespace App\SwannPortal;

use App\Models\Photo;
use Illuminate\Http\Request;

class ImageUpload
{
    protected $id;
    protected $photos;
    protected $request;

    public $destination = null;

    function __construct(Request $request, Photo $photos, $id = false)
    {
        $this->id = $id;
        $this->photos = $photos;
        $this->request = $request;

        $this->destination = public_path() . config('swannportal.path.images');
    }

    public function handle()
    {   
        if(!$this->request->hasFile('image'))
        {
            if ($this->id) {
                $photo = $this->photos->findOrFail($this->id);

                return $photo;
            }

            return null;
        }

        $extension = $this->request->file('image')->getClientOriginalExtension();
        $fileName = str_random(40);

        $this->request->file('image')->move($this->destination, $fileName . '.' . $extension);

        if($this->id) {
            $photo = $this->photos->findOrFail($this->id);

            \File::delete(public_path() . config('swannportal.path.images') . $photo->name . '.' . $photo->extension);

            $photo->update([
                'name'      => $fileName,
                'extension' => $extension
            ]);

        } else {
            $photo = $this->photos->create([
                'name'      => $fileName,
                'extension' => $extension
            ]);
        }

        return $photo;
    }
}