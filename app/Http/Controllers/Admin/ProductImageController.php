<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\ProductContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use App\Trait\UploadAble;
use Illuminate\Http\Request;

class ProductImageController extends BaseController
{
    use UploadAble;
    public $productRepository;
    public function __construct(ProductContract $productContract)
    {
        $this->productRepository = $productContract;
    }

    public function upload(Request $request)
    {
        $this->validate($request,[
            'image'         =>  'nullable|mimes:jpg,jpeg,png,webp,gif,png|max:500'
        ]);
        $product = $this->productRepository->findProductById($request->product_id);
        if ($request->has('image')) {
            $image = $this->uploadOne($request->image, 'products');
            $productImage = new ProductImage([
                'image_link'      =>  $image,
            ]);

            $product->images()->save($productImage);
        }
        session()->put('active_tab','images');
        return response()->json(['status' => 'Success']);
    }

    public function delete($id)
    {
        $image = ProductImage::findOrFail($id);

        if ($image->image_link != '') {
            $this->deleteOne($image->image_link);
        }
        $image->delete();
        session()->put('active_tab','images');
        return redirect()->back();
    }
}
