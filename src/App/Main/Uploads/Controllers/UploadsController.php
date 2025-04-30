<?php

declare(strict_types=1);


namespace App\Main\Uploads\Controllers;

use Illuminate\Http\Request;

class UploadsController
{
    public function process(Request $request)
    {
        $file = is_array($request->input(key: "files"))
            ? $request->file("files")[0]
            : $request->file("files");

        $path = $file ->store("tmp", "local");

        return response()->json($path);
    }

    public function revert(Request $request)
    {
        Storage::disk("local")->delete($request ->getContent());

        return response()->json();
    }
}
