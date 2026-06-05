<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Vendor;
use App\Models\BusinessType;
use App\Models\Category;
use App\Models\CategoryField;
use App\Models\Product;
use App\Models\ProductValue;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Hash;

class ProductDemoSeeder extends Seeder
{
    public function run()
    {
        // ================================
        // 1. USER
        // ================================
        $user = User::create([
            'name' => 'Zain',
            'email' => 'zain2@test.com',
            'password' => Hash::make('123456'),
        ]);

        // ================================
        // 2. VENDOR
        // ================================
        $vendor = Vendor::create([
            'user_id' => $user->id,
            'is_active' => true,
        ]);

        // ================================
        // 3. BUSINESS TYPE
        // ================================
        $businessType = BusinessType::create([
            'vendor_id' => $vendor->id,
            'name' => 'Bike Dealer',
            'slug' => 'bike-dealer',
            'is_active' => true,
        ]);

        // ================================
        // 4. ENGINE CATEGORY
        // ================================
        $engineCategory = Category::create([
            'name' => 'Engine Bikes',
            'slug' => 'engine-bikes',
            'business_type_id' => $businessType->id,
            'is_active' => true,
        ]);

        $enginePower = CategoryField::create([
            'category_id' => $engineCategory->id,
            'name' => 'Engine Power',
            'slug' => 'engine-power',
            'field_type' => 'text',
        ]);

        $fuelType = CategoryField::create([
            'category_id' => $engineCategory->id,
            'name' => 'Fuel Type',
            'slug' => 'fuel-type',
            'field_type' => 'select',
        ]);

        // ================================
        // 5. EV CATEGORY
        // ================================
        $evCategory = Category::create([
            'name' => 'EV Bikes',
            'slug' => 'ev-bikes',
            'business_type_id' => $businessType->id,
            'is_active' => true,
        ]);

        $batteryField = CategoryField::create([
            'category_id' => $evCategory->id,
            'name' => 'Battery Capacity',
            'slug' => 'battery-capacity',
            'field_type' => 'text',
        ]);

        $chargingField = CategoryField::create([
            'category_id' => $evCategory->id,
            'name' => 'Charging Time',
            'slug' => 'charging-time',
            'field_type' => 'text',
        ]);

        // ================================
        // IMAGE POOL (demo URLs)
        // ================================
        $imagePool = [
            'https://picsum.photos/800/500?bike=1',
            'https://picsum.photos/800/500?bike=2',
            'https://picsum.photos/800/500?bike=3',
            'https://picsum.photos/800/500?bike=4',
            'https://picsum.photos/800/500?bike=5',
        ];

        // ================================
        // 6. ENGINE PRODUCTS
        // ================================
        $engineProducts = [
            ['title' => 'Honda CG 125', 'price' => 250000, 'engine' => '125cc', 'fuel' => 'Petrol'],
            ['title' => 'Yamaha YBR 125', 'price' => 320000, 'engine' => '125cc', 'fuel' => 'Petrol'],
            ['title' => 'Suzuki GS 150', 'price' => 380000, 'engine' => '150cc', 'fuel' => 'Petrol'],
            ['title' => 'Honda Pridor', 'price' => 280000, 'engine' => '100cc', 'fuel' => 'Petrol'],
            ['title' => 'Road Prince 70cc', 'price' => 120000, 'engine' => '70cc', 'fuel' => 'Petrol'],
            ['title' => 'Unique 70cc', 'price' => 115000, 'engine' => '70cc', 'fuel' => 'Petrol'],
            ['title' => 'Honda CB 150F', 'price' => 420000, 'engine' => '150cc', 'fuel' => 'Petrol'],
            ['title' => 'Yamaha RX 115', 'price' => 300000, 'engine' => '115cc', 'fuel' => 'Petrol'],
            ['title' => 'Suzuki GD 110S', 'price' => 260000, 'engine' => '110cc', 'fuel' => 'Petrol'],
            ['title' => 'Super Power 125', 'price' => 240000, 'engine' => '125cc', 'fuel' => 'Petrol'],
        ];

        foreach ($engineProducts as $index => $item) {

            $product = Product::create([
                'category_id' => $engineCategory->id,
                'title' => $item['title'],
                'description' => 'Engine bike product',
                'price' => $item['price'],
                'is_active' => true,
            ]);

            ProductValue::create([
                'product_id' => $product->id,
                'field_id' => $enginePower->id,
                'value' => $item['engine'],
            ]);

            ProductValue::create([
                'product_id' => $product->id,
                'field_id' => $fuelType->id,
                'value' => $item['fuel'],
            ]);

            // ================================
            // PRODUCT IMAGES
            // ================================
            $images = [
                $imagePool[$index % count($imagePool)],
                $imagePool[($index + 1) % count($imagePool)],
                $imagePool[($index + 2) % count($imagePool)],
            ];

            foreach ($images as $i => $img) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $img,
                    'is_primary' => $i === 0,
                    'sort_order' => $i,
                ]);
            }
        }

        // ================================
        // 7. EV PRODUCTS
        // ================================
        $evProducts = [
            ['title' => 'Super Power EV Bike', 'price' => 350000, 'battery' => '60V 30Ah', 'charging' => '4 hours'],
            ['title' => 'Metro EV 100', 'price' => 280000, 'battery' => '48V 20Ah', 'charging' => '3.5 hours'],
            ['title' => 'Tesla Mini Bike', 'price' => 450000, 'battery' => '72V 40Ah', 'charging' => '5 hours'],
            ['title' => 'Eco Ride EV', 'price' => 300000, 'battery' => '60V 25Ah', 'charging' => '4 hours'],
            ['title' => 'Future Motion EV', 'price' => 500000, 'battery' => '80V 45Ah', 'charging' => '6 hours'],
            ['title' => 'Green Volt EV', 'price' => 270000, 'battery' => '48V 18Ah', 'charging' => '3 hours'],
            ['title' => 'Swift EV Bike', 'price' => 320000, 'battery' => '60V 28Ah', 'charging' => '4 hours'],
            ['title' => 'Urban Rider EV', 'price' => 390000, 'battery' => '70V 35Ah', 'charging' => '5 hours'],
            ['title' => 'PowerGo EV', 'price' => 410000, 'battery' => '75V 38Ah', 'charging' => '5.5 hours'],
            ['title' => 'Eco Thunder EV', 'price' => 360000, 'battery' => '65V 32Ah', 'charging' => '4.5 hours'],
        ];

        foreach ($evProducts as $index => $item) {

            $product = Product::create([
                'category_id' => $evCategory->id,
                'title' => $item['title'],
                'description' => 'EV bike product',
                'price' => $item['price'],
                'is_active' => true,
            ]);

            ProductValue::create([
                'product_id' => $product->id,
                'field_id' => $batteryField->id,
                'value' => $item['battery'],
            ]);

            ProductValue::create([
                'product_id' => $product->id,
                'field_id' => $chargingField->id,
                'value' => $item['charging'],
            ]);

            // ================================
            // EV PRODUCT IMAGES
            // ================================
            $images = [
                $imagePool[$index % count($imagePool)],
                $imagePool[($index + 2) % count($imagePool)],
            ];

            foreach ($images as $i => $img) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $img,
                    'is_primary' => $i === 0,
                    'sort_order' => $i,
                ]);
            }
        }
    }
}
