<?php

namespace App\Http\Controllers;

use App\Models\ServiceStatus;
use Illuminate\Http\Request;

class ServiceStatusController extends Controller
{

    private $serviceStatus;

    public function __construct(ServiceStatus $serviceStatus) {
        $this->serviceStatus = $serviceStatus;
    }

    public function index() {
        $allServiceStatus = $this->serviceStatus->paginate('10');
        return response()->json(['data' => $allServiceStatus], 200);
    }


    public function store(Request $request) {
        
        $data = $request->all();

        try {
            $newServiceStatus = $this->serviceStatus->create($data);

            return response()->json(['data' => $newServiceStatus], 201);

        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }


    public function show(string $id) {
        try {
            $serviceStatus = $this->serviceStatus->findOrFail($id);
            return response()->json(['data' => $serviceStatus]);

        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }


    public function update(Request $request, string $id) {
        
        $data = $request->all();

        try {
            $serviceStatus = $this->serviceStatus->findOrFail($id);
            $serviceStatus->update($data);

            return response()->json(['data' => $serviceStatus], 202);

        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }


    public function destroy(string $id) {
        try {
            $serviceStatus = $this->serviceStatus->findOrFail($id);
            $serviceStatus->delete();

            return response()->json(['data' => 'deleted'], 202);

        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
}
