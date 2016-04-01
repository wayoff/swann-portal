<?php
namespace App\SwannPortal;

use Illuminate\Http\Request;

class FileUpload
{
    $request = $request;

    function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle()
    {
        // upload
        // generate random name
        // move to public folder
        // return array of extension, name
    }
}