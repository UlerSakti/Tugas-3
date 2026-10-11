<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\License;
use App\Models\Discount;
use App\Models\Asset;
use App\Models\AssetImage;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Review;
use App\Models\Download;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. User
        $user = User::factory()->create([
            'name' => 'M. Raditya Zauhair',
            'email' => 'raditya@example.com',
            'password' => bcrypt('password123')
        ]);

        // 2. Kategori
        $category = Category::create([
            'name' => '3D Characters',
            'slug' => '3d-characters'
        ]);

        // 3. Lisensi
        $license = License::create([
            'name' => 'Commercial License',
            'description' => 'Bolehkah digunakan untuk proyek komersial',
            'price_multiplier' => 1.50
        ]);

        // 4. Diskon
        $discount = Discount::create([
            'code' => 'BLENDER3D',
            'percentage' => 10,
            'valid_until' => now()->addDays(30)
        ]);

        // 5. Asset 3D
        $asset = Asset::create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'title' => 'Cyberpunk Character Blend 4.2',
            'description' => 'Fully rigged 3D character for Blender',
            'price' => 250000,
            'blender_version' => 'Blender 4.2',
            'file_path' => 'uploads/cyberpunk.blend'
        ]);

        // 6. Gambar Asset
        AssetImage::create([
            'asset_id' => $asset->id,
            'image_path' => 'previews/cyberpunk_preview.jpg'
        ]);

        // 7. Order
        $order = Order::create([
            'user_id' => $user->id,
            'discount_id' => $discount->id,
            'order_number' => 'TRX-3D-' . time(),
            'total_price' => 225000,
            'status' => 'completed'
        ]);

        // 8. Item Order
        OrderItem::create([
            'order_id' => $order->id,
            'asset_id' => $asset->id,
            'license_id' => $license->id,
            'price' => 225000
        ]);

        // 9. Ulasan
        Review::create([
            'user_id' => $user->id,
            'asset_id' => $asset->id,
            'rating' => 5,
            'comment' => 'Model 3D sangat bagus dan mudah di-rigging!'
        ]);

        // 10. Log Download
        Download::create([
            'user_id' => $user->id,
            'asset_id' => $asset->id,
            'downloaded_at' => now()
        ]);
    }
}