<?php

namespace App\Services;

class CloudinaryService
{
    private const folder_path = 'tutorial';

    public static function path($path)
    {
        return pathinfo($path, PATHINFO_FILENAME);
    }

    public static function upload($image, $filename, $directory)
    {
        $newFilename = str_replace(' ', '_', $filename);
        $public_id = date('Y-m-d_His') . '_' . $newFilename;
        $result = cloudinary()->upload($image, [
            "public_id" => self::path($public_id),
            "folder"    => $directory
        ]);
        return $result;
    }

    public static function replace($public_id, $image, $filename, $directory)
    {
        self::delete($public_id);
        return self::upload($image, $filename, $directory);
    }

    public static function delete($public_id)
    {
        return cloudinary()->destroy($public_id);
    }
}
