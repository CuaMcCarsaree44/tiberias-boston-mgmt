<?php

namespace App\Common\Facade;

use App\Models\Entity\MemberDocument;
use Illuminate\Support\Facades\Storage;

/**
 * StorageFacade
 * 
 * This facade contains helper to hash, and save file operations.
 */
class StorageFacade {

    /**
     * saveFile
     * 
     * A function to help saving file, and return it's public path link.
     */
    public function saveFile (\Illuminate\Http\UploadedFile|array|null $file): string {
        $file_name = md5(strtotime('now') . $file->getClientOriginalName())
                                . '.'
                                . $file->getClientOriginalExtension();

        Storage::putFileAs(MemberDocument::MEMBER_DOCUMENT_DIRECTORY, $file, $file_name);

        return "/storage/". MemberDocument::MEMBER_DOCUMENT_DIRECTORY .'/'. $file_name;
    }

}