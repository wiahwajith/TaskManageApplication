<?php

namespace App\Repository\Admin;

use App\Models\Admin\Quotation;
use Illuminate\Support\Facades\Auth;

class QuotationRepository 
{
    public function createDeafaultQuotation()
    {
        $user = Auth::user();
        $openQuotation = Quotation::filter()
                                ->own()
                                ->open()
                                ->with('products')
                                ->with('products.assigner')
                                ->with('products.productType')
                                ->first();
        //check has open quotation
        if($openQuotation){
            return $openQuotation;
        }
        
        // create new draft quotation
        $defaultQuotation = [
            'number'=>  Quotation::quoteNumber(),
            'code'=>  'QT',
            'is_open'=> 1,
            'total_amount'=> 0,
            'quotation_status_id'=>  Quotation::status('Following'),
            'company_id'=>  $user->company_id,
            'creator_id'=>  $user->id,
        ];
        $darftQuotation = Quotation::create($defaultQuotation);

        return $defaultQuotation;
    }

    public function updateCreatedQuotation($request , $id)
    {
        $quotation = Quotation::findOrFail($id);

        $quotation->is_open = 0;
        $quotation->customer_id = $request->client;
        $quotation->valid_date = $request->valid_date;

        $quotation->save();

        return $quotation;
    }


}
