<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadItemImageRequest;
use App\Models\Item;
use Cloudinary\Api\Upload\UploadApi;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function updateItemImage(Item $item, UploadItemImageRequest $request, UploadApi $upload)
    {
        $filePath = $request->file('image')->getRealPath();
        $response = $upload->upload($filePath, ['public_id' => $item->id]);
        $item->image_url = $response['url'];
        $item->save();

        return response()->json(['success' => true], 200);
    }
}
