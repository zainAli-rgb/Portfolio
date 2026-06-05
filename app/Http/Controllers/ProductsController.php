<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryField;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductValue;
use App\Services\ProductsService;
use DB;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $productsService;
    public function __construct(ProductsService $productsService)
    {
        $this->productsService = $productsService;
    }

    public function home()
    {
        $products = $this->productsService->getHomeProductsGrouped();

        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }
    public function home2()
    {
        return view('home-products');
    }


    public function getFormData()
    {
        $categories = Category::with([
            'fields' => function ($q) {
                $q->orderBy('sort_order')
                    ->with('options'); // ✅ ADD THIS
            }
        ])
            ->where('business_type_id', 1)
            ->where('is_active', 1)
            ->get();

        return response()->json([
            'success' => true,
            'categories' => $categories
        ]);
    }

    public function create(Request $request)
    {
        dd($request->all());
        $product = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        // save dynamic fields
        foreach ($request->fields as $slug => $value) {
            ProductValue::create([
                'product_id' => $product->id,
                'field_id' => CategoryField::where('slug', $slug)->value('id'),
                'value' => $value
            ]);
        }

        // save images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('products', 'public');

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                    'is_primary' => $index === 0,
                    'sort_order' => $index
                ]);
            }
        }
        dd($product->load('values', 'images'));
        return response()->json([
            'success' => true,
            'message' => 'Product created successfully',
            'data' => $product
        ]);
    }



    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            // 1. Create product
            $product = Product::create([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'category_id' => $request->category_id,
            ]);

            // 2. PRELOAD FIELDS (IMPORTANT FIX)
            $fieldsMap = CategoryField::whereIn(
                'slug',
                array_keys($request->fields ?? [])
            )->pluck('id', 'slug');

            // 3. Save dynamic values
            if ($request->fields) {
                foreach ($request->fields as $slug => $value) {

                    if (!isset($fieldsMap[$slug]))
                        continue;

                    ProductValue::create([
                        'product_id' => $product->id,
                        'field_id' => $fieldsMap[$slug],
                        'value' => is_array($value) ? json_encode($value) : $value,
                    ]);
                }
            }

            // 4. Save images
            if ($request->hasFile('images')) {

                foreach ($request->file('images') as $index => $image) {

                    $path = $image->store('products', 'public');

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $path,
                        'is_primary' => $index === 0,
                        'sort_order' => $index,
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Product created successfully',
                'product_id' => $product->id
            ]);

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
