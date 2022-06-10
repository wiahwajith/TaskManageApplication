<?php

namespace Database\Seeders;

use App\Models\Admin\QuotationStatus;
use Illuminate\Database\Seeder;

class QuotationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuotationStatus::insert([
            [
                'name' => 'Following',
                'code' => 'FL',
                'value' => 1,
                'description' => 'Quotation is following.',
            ],
            [
                'name' => 'Done',
                'code' => 'DN',
                'value' => 2,
                'description' => 'Quotation is paid and Done',
            ],
            [
                'name' => 'Disapproved',
                'code' => 'DA',
                'value' => 3,
                'description' => 'Quotation is rejected by high authorize',
            ],
            [
                'name' => 'Approved',
                'code' => 'AP',
                'value' => 4,
                'description' => 'Quotation is approved',
            ],
        ]);
    }
}
