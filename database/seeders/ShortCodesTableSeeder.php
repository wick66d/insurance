<?php

namespace Database\Seeders;

use App\Models\ShortCode;
use Illuminate\Database\Seeder;

class ShortCodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShortCode::create([
            'shortcode' => 'COMPANY_NAME',
            'replace' => 'Car Insurance Company Ltd.',
        ]);

        ShortCode::create([
            'shortcode' => 'CURRENT_YEAR',
            'replace' => date('Y'),
        ]);

        ShortCode::create([
            'shortcode' => 'CONTACT_EMAIL',
            'replace' => '<a href="mailto:info@carinsurance.com">info@carinsurance.com</a>',
        ]);
    }
}
