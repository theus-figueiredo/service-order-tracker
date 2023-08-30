<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolesRequest;
use App\Models\Roles;
use Illuminate\Http\Request;


class RoleController extends Controller
{

    private $role;

    public function __construct(Roles $role) {
        $this->role = $role;
    }

    public function store(RolesRequest $request) {
        $data = $request->all();

        try {

            $new_role = $this->role->create($data);

            return response()->json(['data' => $new_role]);

        } catch (\Exception $exception) {
            return response()->json(['Error' => $exception->getMessage()], 401);
        }
    }


    public function index() {
        $roles = $this->role->paginate('10');
        return response()->json(['data' => $roles], 200);
    }

    public function show(string $id) {
        try {
            $role = $this->role->findOrFail($id);

            return response()->json(['data' => $role], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

  
    public function update(RolesRequest $request, string $id) {
        
        $data = $request->all();

        try  {

            $role = $this->role->findOrFail($id);
            $role->update($data);

            return response()->json(['data' => $role], 201);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }


    public function destroy(string $id) {
        
        try {

            $role = $this->role->findOrFail($id);
            $role->delete();

            return response()->json(['data' => 'deleted'], 201);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }


    public function usersWithGivenRole(string $id) {

        try {

            $roles_plus_users = $this->role->findOrFail($id);

            return response()->json(['data' => $roles_plus_users->user()], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
}
