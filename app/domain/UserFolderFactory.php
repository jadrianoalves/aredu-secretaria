<?php
namespace App\domain;

use Illuminate\Support\Facades\Storage;


class UserFolderFactory {
    
    public static function create($folderName)
    {
        $disk = Storage::build([
            'driver' =>'local',
            'root' => 'storage/documents/'.$folderName
        ]);
        
    }
    
    
    
}
