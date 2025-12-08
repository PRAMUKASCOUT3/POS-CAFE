<?php

namespace Database\Seeders;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lastKode = Product::max('code');
        $lastNumber = $lastKode ? intval(substr($lastKode, 2)) : 0;

        $menu = [

            // ======================
            // 1. SIGNATURE COFFEE
            // ======================
            ['id_category' => 1, 'name' => 'Caramel Latte Bliss', 'image' => 'https://images.mrcook.app/recipe-image/01936b9c-a4e9-76ee-9ac5-29f99113a40b?cacheKey=U3VuLCAxMiBKYW4gMjAyNSAwMzozODoyNCBHTVQ='],
            ['id_category' => 1, 'name' => 'Vanilla Cream Latte', 'image' => 'https://heartbeetkitchen.com/foodblog/wp-content/uploads/2025/03/iced-vanilla-latte-2.jpg'],
            ['id_category' => 1, 'name' => 'Hazelnut Cloud Coffee', 'image' => 'https://recettes.vedrenne.fr/1195-large_default/iced-chocolate-with-hazelnut-cloud.jpg'],
            ['id_category' => 1, 'name' => 'Mocha Velvet', 'image' => 'https://cappuccine.net/wp-content/uploads/2018/04/RECIPES_cropped-copy-3.jpg.webp'],
            ['id_category' => 1, 'name' => 'Espresso Bold Shot', 'image' => 'https://cms.smokingbarrels.coffee/wp-content/uploads/2025/08/Espresso-Double-Shot.jpg'],
            ['id_category' => 1, 'name' => 'Brown Sugar Latte', 'image' => 'https://www.halfbakedharvest.com/wp-content/uploads/2021/08/Iced-Brown-Sugar-Latte-with-Shaken-Espresso-1-1024x1536.jpg'],
            ['id_category' => 1, 'name' => 'Caramel Macchiato Breeze', 'image' => 'https://www.whiskaffair.com/wp-content/uploads/2020/08/Iced-Caramel-Macchiato-2-1.jpg'],
            ['id_category' => 1, 'name' => 'Irish Cream Cappuccino', 'image' => 'https://i0.wp.com/www.lemonythyme.com/wp-content/uploads/2012/07/Irish-Cream-Cappuccino-with-Kahlua-Cream21.jpg?w=1200'],

            // ======================
            // 2. COFFEE BASED (ICE)
            // ======================
            ['id_category' => 1, 'name' => 'Ice Caramel Latte', 'image' => 'https://www.forkinthekitchen.com/wp-content/uploads/2022/09/220629.iced_.latte_.caramel-9182-1200x1200.jpg'],
            ['id_category' => 1, 'name' => 'Ice Latte Classic', 'image' => 'https://cdn.sanity.io/images/t3ffnogl/production/4294cc06f3fb25a78fe79120fdd0ee682b82f4ee-1321x1294.jpg?w=1000&fm=webp'],
            ['id_category' => 1, 'name' => 'Ice Hazelnut Latte', 'image' => 'https://tyberrymuch.com/wp-content/uploads/2024/03/Hazelnut-Iced-Coffee-Recipe.jpg'],
            ['id_category' => 1, 'name' => 'Ice Americano Citrus', 'image' => 'https://img-global.cpcdn.com/recipes/c11168bffb20f25e/600x852cq80/ice-honey-lemon-americano-foto-resep-utama.webp'],
            ['id_category' => 1, 'name' => 'Ice Mocha Fusion', 'image' => 'https://d1yfn1dfres2va.cloudfront.net/012/29/5b/295b6700141f366ad072cbb47c732c18_1280m.jpg'],
            ['id_category' => 1, 'name' => 'Ice Kopi Susu Aren', 'image' => 'https://asset.kompas.com/crops/oHA_InWvgjNnNKDmm3TszdEj0e0=/0x0:1000x667/1200x800/data/photo/2020/07/26/5f1d9e3132c94.jpg'],

            // ======================
            // 2. Tea (ICE / HOT)
            // ======================
            ['id_category' => 2, 'name' => 'Ice Lemon Tea', 'image' => 'https://shwetainthekitchen.com/wp-content/uploads/2023/07/lemon-iced-tea.jpg'],
            ['id_category' => 2, 'name' => 'Ice Lychee Tea', 'image' => 'https://dcostseafood.id/wp-content/uploads/2021/12/LYCHEE-TEA-1.jpg'],
            ['id_category' => 2, 'name' => 'Ice Peach Tea', 'image' => 'https://www.eatingwell.com/thmb/13rC9VkbLkYr3cvd_V8CI-Xo1Oc=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/peach-iced-tea-hero-1x1-15009_preview_maxWidth_4000_maxHeight_4000_ppi_300_quality_100-0d9f432284a447fc9151868c5acf6c7e.jpg'],
            ['id_category' => 2, 'name' => 'Hot Jasmine Tea', 'image' => 'https://bluetea.co.in/cdn/shop/articles/pexels-photo-7138780.jpg?v=1751437578&width=1100'],
            ['id_category' => 2, 'name' => 'Hot English Breakfast Tea', 'image' => 'https://www.ohhowcivilized.com/wp-content/uploads/english-breakfast-tea-1-1024x1536.jpg'],
            ['id_category' => 2, 'name' => 'Matcha Tea Latte (Hot)', 'image' => 'https://mymilk.com/uploads/image/nov21/shutterstock_318262841.jpg'],
            ['id_category' => 2, 'name' => 'Matcha Tea Latte (Ice)', 'image' => 'https://img-global.cpcdn.com/recipes/c5478f2e375e7488/1280x1280sq80/photo.webp'],

            // ======================
            // 3. NON-COFFEE
            // ======================
            ['id_category' => 3, 'name' => 'Matcha Latte Premium', 'image' => 'https://img-global.cpcdn.com/recipes/61bc69df01f74fc1/600x852f0.5_0.501343_1.0q80/ice-matcha-latte-premium-ceremonial-grade-foto-resep-utama.webp'],
            ['id_category' => 3, 'name' => 'Chocolate Royale', 'image' => 'https://img.lazcdn.com/g/ff/kf/Sf4a6a151db3440e78b0058b82c14cb9ee.jpg_720x720q80.jpg_.webp'],
            ['id_category' => 3, 'name' => 'Red Velvet Cream', 'image' => 'https://img-global.cpcdn.com/recipes/668ad7afb09b450e/600x852cq80/lovely-red-velvet-foto-resep-utama.webp'],
            ['id_category' => 3, 'name' => 'Taro Milk Smooth', 'image' => 'https://img-global.cpcdn.com/recipes/e743e4bce9711835/600x852cq80/fresh-taro-milk-foto-resep-utama.webp'],
            ['id_category' => 3, 'name' => 'Thai Tea Signature', 'image' => 'https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/e3d054d2-5fba-4587-a10b-d16b156e9458_Go-Biz_20241225_185621.jpeg?auto=format'],
            ['id_category' => 3, 'name' => 'Jasmine Milk Tea', 'image' => 'https://img-global.cpcdn.com/recipes/a5f5930d48ac912f/600x852f0.5_0.461323_1.0q80/artisan-premium-jasmine-green-milk-tea-copycat-chagee-%E9%9C%B8%E7%8E%8B%E8%8C%B6%E5%A7%AC-foto-resep-utama.webp'],

            // ======================
            // 4. FRAPPE / BLENDED
            // ======================
            ['id_category' => 3, 'name' => 'Caramel Frappe Crunch', 'image' => 'https://thebigmansworld.com/wp-content/uploads/2021/08/Caramel-ripple-crunch-frappuccino.jpeg'],
            ['id_category' => 3, 'name' => 'Mocha Frost Blend', 'image' => 'https://www.umami.recipes/api/image/recipes/22LmHTFpkud8cO5Jr4Qc/images/4k0Q1072Gq0jmdnrxjJkwZ?w=640&q=75'],
            ['id_category' => 3, 'name' => 'Cookies & Cream Frappe', 'image' => 'https://i.pinimg.com/736x/a2/5e/65/a25e6548c6f57b3e04d553805cd2fe37.jpg'],
            ['id_category' => 3, 'name' => 'Matcha Ice Blend', 'image' => 'https://img-global.cpcdn.com/recipes/c5478f2e375e7488/600x852f0.5_0.617731_1.0q80/iced-matcha-latte-foto-resep-utama.webp'],
            ['id_category' => 3, 'name' => 'Chocolate Avalanche', 'image' => 'https://www.puredrinkology.com/recipes/avalanche/images/cover_hu68511dcec7c0f5425565b810142a783f_300183_1000x0_resize_q75_box.jpeg'],

            // ======================
            // 5. FRESH DRINKS / JUICE
            // ======================
            ['id_category' => 7, 'name' => 'Strawberry Sparkle', 'image' => 'https://img-global.cpcdn.com/recipes/f2dc6572812d8b06/600x852cq80/strawberry-sparkling-foto-resep-utama.webp'],
            ['id_category' => 7, 'name' => 'Mango Sunrise', 'image' => 'https://img-global.cpcdn.com/recipes/968b2b35109b7c82/600x852cq80/mango-sunrise-foto-resep-utama.webp'],
            ['id_category' => 7, 'name' => 'Lemonade Twist', 'image' => 'https://i.pinimg.com/736x/57/3f/1a/573f1ac0958d273fb20dcc345d793d9a.jpg'],
            ['id_category' => 7, 'name' => 'Lychee Breeze', 'image' => 'https://img1.wsimg.com/isteam/ip/000574c6-c753-466a-8d7c-45b42a19aa18/Lychee-Breeze_IG.jpg/:/cr=t:0%25,l:0%25,w:100%25,h:100%25/rs=w:1280'],
            ['id_category' => 7, 'name' => 'Orange Fresh Squeeze', 'image' => 'https://www.kitchentreaty.com/wp-content/uploads/2025/03/fresh-squeezed-orange-juice-2-640x853.jpg'],
            ['id_category' => 7, 'name' => 'Berry Punch', 'image' => 'https://img.delicious.com.au/g117PNU_/w759-h506-cfill/del/2023/12/mixed-berry-punch-cocktail-recipe-203555-2.jpg'],

            // ======================
            // 6. MOCKTAIL
            // ======================
            ['id_category' => 10, 'name' => 'Blue Ocean Mint', 'image' => 'https://ichibansushi.co.id/wp-content/uploads/2023/06/BLUE-OCEAN.jpg'],
            ['id_category' => 10, 'name' => 'Sunset Lychee', 'image' => 'https://drivethru.klikindomaret.com/t95c/wp-content/uploads/sites/67/2023/03/sunset.jpg'],
            ['id_category' => 10, 'name' => 'Tropical Mojito', 'image' => 'https://lonumedhu.com/sites/default/files/tropical-mojito---cover.jpg'],
            ['id_category' => 10, 'name' => 'Green Apple Fizz', 'image' => 'https://nibblesandfeasts.com/wp-content/uploads/2017/06/Apple-Fizz-2.jpg'],
            ['id_category' => 10, 'name' => 'Strawberry Mojito', 'image' => 'https://floridastrawberry.org/wp-content/uploads/2013/07/Florida-Strawberry-Mojito-Recipe.jpg'],
            // ======================
            // ======================
            // 6. SNACK
            // ======================
            ['id_category' => 4, 'name' => 'French Fries', 'image' => 'https://images.themodernproper.com/production/posts/2022/Homemade-French-Fries_8.jpg?w=800&q=82&auto=format&fit=crop&dm=1662474181&s=70c29a2dbd0cfbac22bb3fdedf6fbd29'],
            ['id_category' => 4, 'name' => 'Potato Wedges', 'image' => 'https://beingnutritious.com/wp-content/uploads/2021/06/Potato-Wedges-4-scaled.jpg'],
            ['id_category' => 4, 'name' => 'Chicken Wings', 'image' => 'https://www.dapurkobe.co.id/wp-content/uploads/fire-chicken-wings.jpg'],
            ['id_category' => 4, 'name' => 'Chicken Popcorn', 'image' => 'https://assets.unileversolutions.com/recipes-v3/257561-default.jpg?im=AspectCrop=(767,489);Resize=(767,489)'],
            ['id_category' => 4, 'name' => 'Nachos', 'image' => 'https://assets.tmecosys.com/image/upload/t_web_rdp_recipe_584x480_1_5x/img/recipe/ras/Assets/7695121e-8b9a-4d00-ab96-4430e47266ba/Derivates/445ffdd9-9a8e-48fa-9e86-84c1e94469ca.jpg'],
            ['id_category' => 4, 'name' => 'Onion Rings', 'image' => 'https://static01.nyt.com/images/2020/04/22/dining/ejm-sourdough-03/ejm-sourdough-03-jumbo.jpg?quality=75&auto=webp'],
            ['id_category' => 4, 'name' => 'Garlic Bread', 'image' => 'https://www.ambitiouskitchen.com/wp-content/uploads/2023/02/Garlic-Bread-4-750x750.jpg'],
            ['id_category' => 4, 'name' => 'Toast Cheese', 'image' => 'https://hips.hearstapps.com/del.h-cdn.co/assets/17/17/1280x719/gallery-1493418831-delish-french-toast-grilled-cheese-9.jpg?resize=640:*'],
            ['id_category' => 4, 'name' => 'Sosis Bakar', 'image' => 'https://image.idntimes.com/post/20201231/fromandroid-2f48ec126fbe5311c2612b835bb85c4a.jpg?tr=w-1200,f-webp,q-75&width=1200&format=webp&quality=75'],

            // ======================
            // 7. DESSERT
            // ======================
            ['id_category' => 5, 'name' => 'Brownies', 'image' => 'https://bakingthegoods.com/wp-content/uploads/2024/10/Mocha-Almond-Fudge-Cookies-43-1200x1200.jpg'],
            ['id_category' => 5, 'name' => 'Choco Lava Cake', 'image' => 'https://www.melskitchencafe.com/wp-content/uploads/2023/01/updated-lava-cakes8-1059x1536.webp'],
            ['id_category' => 5, 'name' => 'Waffle Ice Cream', 'image' => 'https://images.pexels.com/photos/704569/pexels-photo-704569.jpeg'],
            ['id_category' => 5, 'name' => 'Pancake Maple', 'image' => 'https://images.pexels.com/photos/376464/pexels-photo-376464.jpeg'],
            ['id_category' => 5, 'name' => 'Crepes', 'image' => 'https://www.umami.recipes/api/image/recipes/CS4uww0StgbPqZk32pkO/images/U969pvP9RnN3eJ4oLaKrkz?w=1080&q=75'],
            ['id_category' => 5, 'name' => 'Pudding Caramel', 'image' => 'https://assets-cloudflare.segari-ops.id/recipes/puding-karamel-lsbbzx2sFEorW.jpg'],
            ['id_category' => 5, 'name' => 'Japanese Cheesecake', 'image' => 'https://www.justonecookbook.com/wp-content/uploads/2024/12/Japanese-Cheesecake-4671-2024-NEW-II-1024x1536.jpg'],
            ['id_category' => 5, 'name' => 'Tiramisu Slice', 'image' => 'https://img.taste.com.au/4K8Ctu3W/w720-h480-cfill-q80/taste/2024/10/easy-tiramisu-slice-recipe-main-203719-1.jpg'],

            // ======================
            // 8. MAIN COURSE
            // ======================
            ['id_category' => 6, 'name' => 'Chicken Steak', 'image' => 'https://img-global.cpcdn.com/recipes/eed1ca95f5807bef/600x852f0.5_0.561712_1.0q80/chicken-steak-viral-foto-resep-utama.webp'],
            ['id_category' => 6, 'name' => 'Beef Steak', 'image' => 'https://images.pexels.com/photos/675951/pexels-photo-675951.jpeg'],
            ['id_category' => 6, 'name' => 'Chicken Teriyaki Rice', 'image' => 'https://modernmealmakeover.com/wp-content/uploads/2020/10/IMG_6548-4-800x530.jpg.webp'],
            ['id_category' => 6, 'name' => 'Chicken Katsu Curry', 'image' => 'https://feedgrump.com/wp-content/uploads/2023/05/hawaii-chicken-katsu-curry-plating-1152x1536.jpg'],
            ['id_category' => 6, 'name' => 'Spaghetti Bolognese', 'image' => 'https://images.pexels.com/photos/1279330/pexels-photo-1279330.jpeg'],
            ['id_category' => 6, 'name' => 'Spaghetti Aglio Olio', 'image' => 'https://akcdn.detik.net.id/community/media/visual/2021/03/19/spaghetti-aglio-olio_43.jpeg?w=700&q=90'],
            ['id_category' => 6, 'name' => 'Nasi Goreng Special', 'image' => 'https://asset.kompas.com/crops/VcgvggZKE2VHqIAUp1pyHFXXYCs=/202x66:1000x599/1200x800/data/photo/2023/05/07/6456a450d2edd.jpg'],
            ['id_category' => 6, 'name' => 'Mie Goreng Cafe', 'image' => 'https://asset.kompas.com/crops/k2_R0gCBgjGDZMgCYF3J5vodDcA=/0x69:1000x736/1200x800/data/photo/2022/01/28/61f3482f45891.jpeg'],
            ['id_category' => 6, 'name' => 'Rice Bowl Sambal Matah', 'image' => 'https://asset.kompas.com/crops/M8Fid8VM2UbGC2tP3SHjKprV2fA=/0x44:1000x710/1200x800/data/photo/2021/01/26/600fc38cb69cc.jpg'],

            // ======================
            // 9. MILKSHAKE
            // ======================
            ['id_category' => 9, 'name' => 'Chocolate Milkshake', 'image' => 'https://asset.kompas.com/crops/hCzQp_lseY7WlTf--9jjpbLPCoM=/83x67:940x638/1200x800/data/photo/2022/10/17/634d11c2c0a21.jpg'],
            ['id_category' => 9, 'name' => 'Vanilla Milkshake', 'image' => 'https://www.organicvalley.coop/_next/image/?url=https%3A%2F%2Fcdn.sanity.io%2Fimages%2F5dqbssss%2Fproduction-v3%2Fd064c9029aced692680f6faebd047a0ca03fddbf-1356x1576.jpg&w=1080&q=75'],
            ['id_category' => 9, 'name' => 'Strawberry Milkshake', 'image' => 'https://www.thehungrybites.com/wp-content/uploads/2023/06/Strawberry-milkshake-frappuccino-no-ice-cream-1024x1536.jpg'],
            ['id_category' => 9, 'name' => 'Oreo Milkshake', 'image' => 'https://www.whiskaffair.com/wp-content/uploads/2020/07/Oreo-Milkshake-2-1-1024x1536.jpg'],
            ['id_category' => 9, 'name' => 'Caramel Milkshake', 'image' => 'https://bromabakery.com/wp-content/uploads/2016/03/Caramel-Milkshake-3-1067x1600.jpg'],

        ];

        $defaultBrand = "Cafe House Blend";
        $defaultStock = 50;
        $now = Carbon::now();

        foreach ($menu as $index => $menus) {

            $lastNumber++;

            // Tentukan harga BUY & SELL berdasarkan kategori
            switch ($menus['id_category']) {
                case 1: // Coffee
                    $price_buy = match ($menus['name']) {
                        'Espresso Bold Shot' => 5000,
                        default => rand(10000, 13000),
                    };
                    $price_sell = $price_buy * 2.2;
                    break;

                case 2: // Tea
                    $price_buy = rand(4000, 8000);
                    $price_sell = $price_buy * 1.8;
                    break;

                case 3: // Non Coffee Milk
                    $price_buy = rand(7000, 9000);
                    $price_sell = $price_buy * 2.1;
                    break;

                case 4: // Snack
                    $price_buy = rand(6000, 12000);
                    $price_sell = $price_buy * 1.8;
                    break;

                case 5: // Dessert
                    $price_buy = rand(6000, 12000);
                    $price_sell = $price_buy * 2.0;
                    break;

                case 6: // Main Course
                    $price_buy = rand(10000, 30000);
                    $price_sell = $price_buy * 1.8;
                    break;

                case 7: // Fresh Drink / Juice
                    $price_buy = rand(5000, 9000);
                    $price_sell = $price_buy * 2.0;
                    break;

                case 10: // Mocktail
                    $price_buy = rand(6000, 10000);
                    $price_sell = $price_buy * 2.0;
                    break;

                default:
                    $price_buy = 10000;
                    $price_sell = 20000;
            }

            Product::create([
                'id_category' => $menus['id_category'],
                'code' => 'MN' . str_pad($lastNumber, 4, '0', STR_PAD_LEFT),
                'name' => $menus['name'],
                'brand' => $defaultBrand,
                'stock' => $defaultStock,
                'price_buy' => $price_buy,
                'price_sell' => $price_sell,
                'unit' => 'Cup',
                'image' => $menus['image'],
                'created_at' => $now->copy()->addMinutes($index),
                'updated_at' => $now->copy()->addMinutes($index),
            ]);
        }
    }
}
