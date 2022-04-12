<?php


namespace App\Service;

use App\Exceptions\DownloadException;


class DownloadService
{
    public function download($filename)
    {
        $file_path = public_path() . '/files/books/' . $filename;
        if (file_exists($file_path)) {
            return response()->download($file_path, $filename, [
                'Content-Length: ' . filesize($file_path)
            ]);
        } else {
            // Error
            throw new DownloadException(__('file1'));
        }
    }
}
