<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Vendor',
            'breadcrumbs' => [
                [
                    'title' => 'Dashboard',
                ],
                [
                    'title' => 'Vendor',
                ],
            ],
            'mods' => 'vendors',
        ];
        return view('admins.vendor.index', $data);
    }

    public function getData()
    {
        return DataTables::of(Vendor::all())->make();
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $request->validate([
                'name' => 'required',
                'address' => 'required',
                'contact_person' => 'required',
            ]);

            Vendor::create($request->only(['name', 'address', 'contact_person']));
            DB::commit();
            return response()->json([
                'message' => 'Successfully added data'
            ], 200);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json([
                'message' => 'Oops, Error add data'
            ], 500);
        }
    }
    public function update(Vendor $vendor, Request $request)
    {
        DB::beginTransaction();
        try{
            $request->validate([
                'name' => 'required',
                'address' => 'required',
                'contact_person' => 'required',
            ]);

            $vendor->update($request->only(['name', 'address', 'contact_person']));
            DB::commit();
            return response()->json([
                'message' => 'Successfully updated data'
            ], 200);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json([
                'message' => 'Oops, Error add data'
            ], 500);
        }
    }

    public function destroy(Vendor $vendor)
    {
        try {
            if($vendor->menuItem->count() > 0){
                return response()->json([
                    'message' => 'You have Menu Item with this Vendor!',
                ], 500);
            }

            $vendor->delete();

            return response()->json([
                'message' => 'Successfully deleted'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Oops! An error occurred, please check again!',
            ], 500);
        }
    }
}
