<?php
namespace App\SwannPortal;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentUpload
{
    protected $id;
    protected $request;
    protected $documents;

    public $destination = null;

    function __construct(Request $request, Document $documents, $id = false)
    {
        $this->id = $id;
        $this->request = $request;
        $this->documents = $documents;

        $this->destination = public_path() . config('swannportal.path.documents');
    }

    public function handle()
    {
        if(!$this->request->hasFile('document'))
        {
            if ($this->id) {
                $document = $this->documents->findOrFail($this->id);

                return $document;
            }

            return null;
        }

        $extension = $this->request->file('document')->getClientOriginalExtension();
        $fileName = str_random(40);

        $this->request->file('document')->move($this->destination, $fileName . '.' . $extension);


        if($this->id) {
            $document = $this->documents->findOrFail($this->id);

            \File::delete(public_path() . config('swannportal.path.documents') . $document->name . '.' . $document->extension);

            $document->update([
                'name'      => $fileName,
                'extension' => $extension
            ]);

        } else {
            $document = $this->documents->create([
                'name'      => $fileName,
                'extension' => $extension
            ]);
        }

        return $document;
    }
}