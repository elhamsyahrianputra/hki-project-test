<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\BrandStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\UpdateBrandStatusRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function similarity(String $string1, String $string2)
    {
        $word1 = strtolower($string1);
        $word2 = strtolower($string2);

        $levenshteinDistance = levenshtein($word1, $word2);
        $maxStringLength = max(strlen($word1), strlen($word2));

        // Calculate similarity percentage
        $percent = ($maxStringLength - $levenshteinDistance) / $maxStringLength * 100;

        return round($percent, 1);
    }

    public function getsimilarityData($brand) {
        $result = [];
        $data_pdki = Brand::getPDKI($brand);

        foreach ($data_pdki['hits']['hits'] as $index => $data) {
            
            if ($index == 5) {
                break;
            }

            $result[] = [
                'name' => $data['_source']['nama_merek'],
                'image_url' => $data['_source']['image'][0]['image_path'],
                'similarity' => $this->similarity($brand, $data['_source']['nama_merek']),
            ];
        }

        return $result;
    }

    public function index()
    {
        return view('dashboard.admin.brand.index', [
            'brands' => Brand::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

        return view('dashboard.admin.brand.show', [
            'brand' => $brand,
            'status_history' => $status_history,
            // 'similarity_data' => $this->getSimilarityData($brand->name),
            'similarity_data' => [],
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
    public function update(UpdateBrandStatusRequest $request, Brand $brand)
    {
        $validatedData = $request->validated();
        $validatedData['brand_id'] = $brand->id;
        BrandStatus::create($validatedData);
        Brand::find($brand->id)->touch();

        return redirect(route('admin.brands.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
