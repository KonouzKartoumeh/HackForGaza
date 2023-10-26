<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResourceLink;

class ResourceLinkController extends Controller
{
    public function extractFacebookVideoId($url) {
        if (preg_match('/[?&]v=([^&]+)/', $url, $matches)) {
            return $matches[1];
        }
    
        return null; // رابط Facebook غير صالح
    }
    public function extractTikTokVideoId($url) {
        // استخراج معرف الفيديو من رابط TikTok
        $path = parse_url($url, PHP_URL_PATH);
        $parts = explode('/', $path);
    
        if (count($parts) > 1) {
            return end($parts);
        }
    
        return null; // رابط TikTok غير صالح
    }
    
    public function index()
    {
        $resourceLinks = ResourceLink::all();
        return view('resource_links.index', compact('resourceLinks'));
    }
}
