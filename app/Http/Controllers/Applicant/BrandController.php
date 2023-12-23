<?php

namespace App\Http\Controllers\Applicant;

use App\Models\Brand;
use App\Models\BrandStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Applicant\Brand\StoreBrandRequest;
use App\Http\Requests\Applicant\Brand\UpdateBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::where('user_id', auth()->user()->id)->orderBy('updated_at','desc')->get();

        return view('dashboard.applicant.brand.index', [
            'brands' => $brands,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.applicant.brand.create', [

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->file('logo_url')) {
            $validatedData['logo_url'] = $request->file('logo_url')->store('brand/logo');
        } 
        
        if ($request->file('certificate_url')) {
            $validatedData['certificate_url'] = $request->file('certificate_url')->store('brand/certificate');
        } 
        
        if ($request->file('signature_url')) {
            $validatedData['signature_url'] = $request->file('signature_url')->store('brand/signature');
        }

        

        $brand = Brand::create($validatedData);
        BrandStatus::create([
            'brand_id' => $brand->id,
            'status' => 'applied',
        ]);

        return redirect(route('applicant.brands.index'))->with('storeBrand', 'Permohonan Merk Berhasil Diajukan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        $status = BrandStatus::where('brand_id', $brand->id)->orderBy('updated_at', 'desc')->get();

        foreach ($status as $status_single) {
            $status_history[] = $status_single->status;
        }

        return view('dashboard.applicant.brand.show', [
            'brand' => $brand,
            'status_history' => $status_history,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $validatedData = $request->validated();

        if ($request->file('logo_url')) {
            Storage::delete($brand->logo_url);
            $validatedData['logo_url'] = $request->file('logo_url')->store('brand/logo');
        } 
        
        if ($request->file('certificate_url')) {
            Storage::delete($brand->certificate_url);
            $validatedData['certificate_url'] = $request->file('certificate_url')->store('brand/certificate');
        } 
        
        if ($request->file('signature_url')) {
            Storage::delete($brand->signature_url);
            $validatedData['signature_url'] = $request->file('signature_url')->store('brand/signature');
        }

        Brand::find($brand->id)->update($validatedData);
        BrandStatus::create([
            'brand_id' => $brand->id,
            'status' => 'revised'
        ]);
        
        return redirect(route('applicant.brands.index'))->with('updateBrand', 'Permohonan Merk Berhasil Direvisi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
