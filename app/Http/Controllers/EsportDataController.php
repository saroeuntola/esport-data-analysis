<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\EsportDataImport;
use Illuminate\Http\Request;
use App\Models\EsportData;
use Maatwebsite\Excel\Facades\Excel;

class EsportDataController extends Controller
{

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt,xlsx,xls|max:51200',
        ]);

        Excel::import(new EsportDataImport, $request->file('file'));

        return response()->json([
            'success' => true,
            'message' => 'File imported successfully!',
        ]);
    }


    public function getAllEsportData()
    {
        try {
            $data = EsportData::all();
            return response()->json([
                'success' => true,
                'esport_data' => $data
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch esport data',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
