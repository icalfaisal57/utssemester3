<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Patients;
use Illuminate\Http\Request;
use App\Http\Requests\PatientsRequest;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      if($request->filled('filter_by')){//kondisi if jika ingin memfilter dengan cara menangkap apakah filternya diisi atau tidak
        $filter = $request->input('filter_by');//menangkap filter kolom yang diinginkan
        $default = "asc"; //untuk mengatur default value di sort agar menjadi ascending
        $sort = $request->input('sort_by')??$default;//menangkap asc atau desc

        $patients = Patients::orderBy("$filter", "$sort")->get();
        $data=[
            'message'=> 'get students',
            'data'=> $patients,
            'filter by' => $filter 
        ];
        return response()->json($data, 200);
        // view('data.index', compact('filteredData'));
      }
      else{$patients = Patients::all();//kondisi jika filter tidak diisi maka akan menampilkan semua data
        $data=[
            'message'=> 'get all students',
            'data'=> $patients        
        ];
        return response()->json($data,200);}
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
    public function store(PatientsRequest $request)
    {
        $patients = Patients::create($request->all());

		$result = [
			'message' => 'Data Student Berhasil Dibuat',
			'data' => $patients,
		];

		return response()->json($result, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        {
            $patients = Patients::find($id);
    
            if ($patients) {
                $response = [
                    'message' => 'Get detail patients',
                    'data' => $patients
                ];
        
                return response()->json($response, 200);
            } else {
                $response = [
                    'message' => 'Data not found'
                ];
                
                return response()->json($response, 404);
            }
        }
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
    public function update(PatientsRequest $request, string $id)//validate
    {
        $patients = Patients::find($id);
        $patients->update($request->all());
		if ($patients) {
			$data = [
				'message' => 'patients is updated',
				'data' => $patients
			];
	
			return response()->json($data, 200);
		} else {
			$response = [
				'message' => 'Data not found'
			];

			return response()->json($response, 404);
		}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patients = Patients::find($id);
        $patients->delete();
		if ($patients) {
			$response = [
				'message' => 'patients is delete',
				'data' => $patients
			];

			return response()->json($response, 200); 
		} else {
			$response = [
				'message' => 'Data not found'
			];

			return response()->json($response, 404);
		}
    }
}
