<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicePriorityRequest;
use App\Models\ServicePriority;
use Illuminate\Http\Request;

class ServicePriorityController extends Controller
{

    private $servicePriority;

    public function __construct(ServicePriority $servicePriority) {
        $this->servicePriority = $servicePriority;
    }

    public function index() {
        $servicePriority = $this->servicePriority->paginate('10');
        return response()->json(['data' => $servicePriority], 200);
    }


    public function store(ServicePriorityRequest $request) {
        $data = $request->all();

        try {
            $newServicePriority = $this->servicePriority->create($data);
            return response()->json(['data' => $newServicePriority], 201);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }


    public function show(string $id) {
        try {
            $servicePriority = $this->servicePriority->findOrFail($id);

            return response()->json(['data' => $servicePriority], 201);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }


    public function update(ServicePriorityRequest $request, string $id) {
        $data = $request->all();

        try {
            $servicePriority = $this->servicePriority->findOrFail($id);
            $servicePriority->update($data);

            return response()->json(['data' => $servicePriority], 202);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }


    public function destroy(string $id) {
        try {
            $servicePriority = $this->servicePriority->findOrFail($id);
            $servicePriority->delete();

            return response()->json(['data' => 'deleted'], 202);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
