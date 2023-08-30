<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceCategoryRequest;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{

    private $serviceCategory;

    public function __construct(ServiceCategory $serviceCategory) {
        $this->serviceCategory = $serviceCategory;
    }

    public function index() {
        $allServiceCategories = $this->serviceCategory->paginate('10');
        return response()->json(['data' => $allServiceCategories], 200);
    }


    public function store(ServiceCategoryRequest $request) {
        
        $data = $request->all();

        try {
            $newServiceCategory = $this->serviceCategory->create($data);
            return response()->json(['data' => $newServiceCategory], 201);

        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }

    }


    public function show(string $id) {
        try {
            $serviceCategory = $this->serviceCategory->findOrFail($id);
            return response()->json(['data' => $serviceCategory], 200);

        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }


    public function update(ServiceCategoryRequest $request, string $id) {

        $data = $request->all();

        try {
            $serviceCategory = $this->serviceCategory->findOrFail($id);
            $serviceCategory->update($data);

            return response()->json(['data' => $serviceCategory], 202);

        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }


    public function destroy(string $id) {
        try {
            $serviceCategory = $this->serviceCategory->findOrFail($id);
            $serviceCategory->delete();

        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
}
