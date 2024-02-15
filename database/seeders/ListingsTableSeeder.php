<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ListingsTableSeeder extends Seeder
{
    public function run()
    {
        // Create a parent listing
        $parentId = DB::table('listings')->insertGetId([
            'sku' => 'PSKU-' . Str::random(5), // Generate a random SKU for demonstration
            'asin' => Str::random(10), // Generate a random ASIN for demonstration
            'parent_id' => null, // Parent listing, so parent_id is null
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create a few child listings
        for ($i = 0; $i < 5; $i++) {
            DB::table('listings')->insert([
                'sku' => 'SKU-' . Str::upper(Str::random(5)), // Generate a random SKU for demonstration
                'asin' => 'BO7' . Str::upper(Str::random(7)), // Generate a random ASIN for demonstration
                'parent_id' => $parentId, // Set the parent ID to link to the parent listing
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
