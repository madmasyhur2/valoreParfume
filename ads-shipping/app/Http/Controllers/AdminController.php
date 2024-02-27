<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Shipping;
use App\Models\District;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function index()
    {
        $shippings = Shipping::all();
        return view('admin.index', compact('shippings'));
        // return response()->json($shippings);
    }

    public function edit($id)
    {
        $shipping = Shipping::findOrFail($id);
        return view('admin.edit', compact('shipping'));
        // return response()->json($shipping);
    }
    
    public function update(Request $request, $id)
    {
        $shipping = Shipping::findOrFail($id);
        $shipping->update($request->all());
        return redirect()->route('admin.shippings')->with('success', 'Shipping data updated successfully');
        // return response()->json([$shipping, 'message' => 'Shipping data updated successfully!']);
    }

    public function destroy($id)
    {
        Shipping::destroy($id);
        return redirect()->route('admin.index')->with('success', 'Shipping information deleted successfully!');
    }

// public function destroy(District $district)
// {
//     try {
//         $district->delete();

//         return response()->json([
//             'success' => true,
//             'message' => 'Data deleted successfully'
//         ]);
//     } catch (\Throwable $th) {
//         return response()->json([
//             'success' => false,
//             'message' => $th->getMessage()
//         ]);
//     }
// }

    public function dataTable(Request $request)
    {
        try {
            if ($request->ajax()) {
                $query = District::query()->with(['regency', 'regency.province']);
                
                return DataTables::eloquent($query)
                ->addIndexColumn()
                ->editColumn('name', function($item){
                    return Str::upper($item->name);
                })
                ->addColumn('action', function($item){
                    return '<div class="d-flex justify-content-end">
                                <a href="' . route('admin.edit', $item->id) . '" class="btn btn-sm btn-primary me-2">Edit</a>
                                <a role="button" data-id="'.$item->id.'" class="btn btn-sm btn-danger deleteConfirm">Delete</a>
                            </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
            }

            return view('admin.index');

        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
