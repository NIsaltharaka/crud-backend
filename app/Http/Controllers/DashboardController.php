<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Http\Request;
use App\Models\Detail;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{


    /**
     * create detail
     * @param Request $request
     * @return Detail 
     */
    public function add(Request $request)
    {
        try {
            $details = Detail::create($request->all());
    
            return response()->json(['message' => 'User details added successfully', 'user' => $details], 201);
        } catch (\Exception $e) {

            return response()->json(['message' => 'Error saving user details', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Get details
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetails()
    {
        try {
            $details = Detail::all();
            return response()->json($details, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error fetching details', 'error' => $e->getMessage()], 500);
        }
    }

    /**
 * Delete detail by ID
 * @param int $id
 * @return \Illuminate\Http\JsonResponse
 */
public function destroyDetail($id)
{
    try {
        $detail = Detail::find($id);

        if (!$detail) {
            return response()->json(['message' => 'Detail not found'], 404);
        }

        $detail->delete();

        return response()->json(['message' => 'Detail deleted successfully'], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error deleting detail', 'error' => $e->getMessage()], 500);
    }
}


public function updateDetail(Request $request, $id)
{
    try {
        $detail = Detail::find($id);

        if (!$detail) {
            return response()->json(['message' => 'Detail not found'], 404);
        }

        // Validate request data here if needed

        $detail->update($request->all());

        return response()->json(['message' => 'Detail updated successfully', 'detail' => $detail], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error updating detail', 'error' => $e->getMessage()], 500);
    }
}

public function getDetailById($id)
{
    try {
        $detail = Detail::find($id);

        if (!$detail) {
            return response()->json(['message' => 'Detail not found'], 404);
        }

        return response()->json($detail, 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error fetching detail by ID', 'error' => $e->getMessage()], 500);
    }
}

}
