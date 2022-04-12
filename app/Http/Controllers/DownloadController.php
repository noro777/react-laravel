<?php

namespace App\Http\Controllers;

use App\Exceptions\DownloadException;
use App\Http\Controllers\Controller;
use App\Service\DownloadService;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    protected $service;

    public function __construct(DownloadService $service)
    {
        $this->service = $service;
    }

    public function download(Request $request, $filename)
    {
        try {
            $this->service->download($filename);
        } catch (DownloadException $e) {
            return $request->wantsJson() ? response()->json($e->getMessage(), 400) : exit($e->getMessage());
        }
    }
}
