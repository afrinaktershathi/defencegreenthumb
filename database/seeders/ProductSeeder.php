<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = new Product();
        $product->name = 'Xtrike Me GC-905 Gaming Chair';
        $product->detials = 'The Xtrike Me GC-905 Gaming Chair is a versatile and ergonomic seating option designed for gamers who value comfort and functionality. Its 100mm gas system enables simple height adjustment, accommodating personal preferences during intense gaming sessions. The Xtrike Me GC-905 Gaming Chair has a robust 350mm nylon base with arms for stability and support. The chair, made of high-quality materials such as PU and PVC, is built to last and has a fake leather finish for a sleek appearance. The "Butterfly" adjustment mechanism allows users to fine-tune their seating position, while the 360° rotation and 180° tilt options provide further flexibility. The PVC armrests enhance overall comfort, and the chair includes a detachable head support and a lower spine pillow for enhanced support during longer use. The smart design, combined with the synthetic leather finish, makes the Xtrike Me GC-905 Gaming Chair a fashionable and functional option for gamers wishing to improve their gaming experience.';
        $product->price = 100;
        $product->image = asset('demo/chair.webp');
        $product->save();
    }
}
