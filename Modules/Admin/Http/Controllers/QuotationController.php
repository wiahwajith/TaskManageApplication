<?php

namespace Modules\Admin\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repository\Admin\UserRepository;
use Illuminate\Support\Facades\Redirect;
use App\Repository\Admin\ProductRepository;
use Illuminate\Contracts\Support\Renderable;
use App\Repository\Admin\QuotationRepository;
use Modules\Admin\Http\Requests\QuotationUpdateRequest;

class QuotationController extends Controller
{   
    public $quotationRepository;
    public $userRepository;
    public $productRepository;

    public function __construct(QuotationRepository $quotationRepository ,UserRepository $userRepository ,ProductRepository $productRepository) 
    {
        $this->quotationRepository = $quotationRepository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $quotation = $this->quotationRepository->createDeafaultQuotation();
        $company = $this->userRepository->userCompany();
        $users = $this->userRepository->AllCompanyUsers();
        $productTypes = $this->productRepository->getAllProductTypes();

        return Inertia::render('Admin/Quotation' ,compact('quotation','company','users','productTypes'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(QuotationUpdateRequest $request, $id)
    {
        $quotation = $this->quotationRepository->updateCreatedQuotation($request ,$id);
        if($quotation)return back()->with('successMessage', 'Quotation created successfully!');
        return back()->with('errorMessage', 'problem with Quotation creating!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
