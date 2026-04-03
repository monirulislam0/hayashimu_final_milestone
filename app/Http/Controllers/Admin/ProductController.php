<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Exports\ProductsExport;
use App\Http\Controllers\BaseController;
use App\Imports\ProductsImport;
use App\Models\Category;
use App\Models\ProductCategory;
use App\Trait\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends BaseController
{
    public $categoryRepository;
    public $productRepository;

    public function __construct(ProductContract $productContract, CategoryContract $categoryContract)
    {
        $this->productRepository = $productContract;
        $this->categoryRepository = $categoryContract;
    }

       public function index(Request $request)
    {
        $old_data = $request->all();
        $this->setPageTitle('Product', 'List of products');
        $products = $this->productRepository->filterProducts($request);
        $categories = $this->categoryRepository->listCategories();
        return view('admin.products.index', compact('products','categories','old_data'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->listCategories('name', 'asc');
        $this->setPageTitle('Products', 'Create Product');
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:products|max:191',
            'price' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'unit' => 'nullable|string|max:50',
            'emi_text' => 'nullable|string|max:255',
            'categories' => 'required',
            'image' => 'mimes:jpg,jpeg,png,webp|max:500',
        ]);
        $params = $request->except('_token');
        $product = $this->productRepository->createProduct($params);
        session()->put('active_tab', 'images');
        if (!$product) {
            return $this->responseRedirectBack('Error occurred while creating product', 'error', true, true);
        }
        $this->removeCache('', '', $params['categories']);
        return $this->responseRedirect('admin.products.edit', 'Product Added Successfully', 'success', false, false, $product->id);
    }

    public function edit($id)
    {
        $product = $this->productRepository->findProductById($id);
        $categories = $this->categoryRepository->listCategories('name', 'asc');
        session()->put('active_tab', 'general');
        $this->setPageTitle('Products', 'Edit Product');
        return view('admin.products.edit', compact('categories', 'product'));
    }

    /**
     * @param StoreProductFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'price' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'unit' => 'nullable|string|max:50',
            'emi_text' => 'nullable|string|max:255',
            'categories' => 'required',
            'image' => 'mimes:jpg,jpeg,png,webp|max:500',
        ]);

        $params = $request->except('_token');
        $product = $this->productRepository->updateProduct($params);
        session()->put('active_tab', 'general');
        if (!$product) {
            return $this->responseRedirectBack('Error occurred while updating product.', 'error', true, true);
        }
        $this->removeCache($product->slug, $product->id, $params['categories']);
        return $this->responseRedirectBack('Product updated successfully.', 'success', false, false);
//        return $this->responseRedirect('admin.products.index', 'Product updated successfully' ,'success',false, false);

    }

    public function description(Request $request)
    {
        $params = $request->except('_token');
        $product = $this->productRepository->updateProduct($params);
        $categories = [];
        foreach ($product->categories as $cat) {
            array_push($categories, $cat->id);
        }
        session()->put('active_tab', 'description');
        if (!$product) {
            return $this->responseRedirectBack('Error occurred while updating product.', 'error', true, true);
        }
        $this->removeCache($product->slug, $product->id, $categories);
        return $this->responseRedirectBack('Description updated successfully.', 'success', false, false);

    }

    public function meta(Request $request)
    {
        $params = $request->except('_token');
        $product = $this->productRepository->updateProduct($params);
        $categories = [];
        foreach ($product->categories as $cat) {
            array_push($categories, $cat->id);
        }

        session()->put('active_tab', 'meta');
        if (!$product) {
            return $this->responseRedirectBack('Error occurred while updating product.', 'error', true, true);
        }
        $this->removeCache($product->slug, $product->id, $categories);
        return $this->responseRedirectBack('Meta description updated successfully.', 'success', false, true);
//        return $this->responseRedirect('admin.products.index', 'Product updated successfully' ,'success',false, false);
    }

    public function delete($id)
    {
        $categories = ProductCategory::where('product_id', $id)->pluck('category_id')->toArray();
        $product = $this->productRepository->deleteProduct($id);
        if (!$product) {
            return $this->responseRedirectBack('Error occurred while deleting product', 'error', true, true);
        }
        $this->removeCache($product->slug, $product->id, $categories);
        return $this->responseRedirect('admin.products.index', 'Product deleted successfully', 'success', false, false);
    }

    protected function removeCache($slug = null, $id = null, $categories = [])
    {
        Cache::forget('new_item');
        Cache::forget('featured');
        if ($slug != null) {
            Cache::forget('product-detail-'.$slug);
        }
        if ($id != null) {
            Cache::forget('product_by_id_'.$id);
        }
        if ($categories != null) {
            foreach ($categories as $category) {
                    $cat = Category::where('id', $category)->select('id', 'slug')->first();
                    if (isset($cat->slug) && $cat->slug != null) {
                        Cache::forget('category_product_with_slug_'.$cat->slug);
                    }
            }
        }
    }

    public function exportProductData()
    {
        return Excel::download(new ProductsExport(), 'products.xlsx');
    }

    public function importView()
    {
        $this->setPageTitle('Products', 'Import Data');
        return view('admin.products.import');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
        ]);
        $path = $request->file('file')->store('files');
        Excel::import(new ProductsImport, $path);
        return $this->responseRedirectBack('Data imported Successfully.', 'success', false, true);
    }

}
