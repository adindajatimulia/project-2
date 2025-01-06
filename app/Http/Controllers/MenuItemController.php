<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Vendor;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;

class MenuItemController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Menu Item',
            'breadcrumbs' => [
                [
                    'title' => 'Dashboard',
                ],
                [
                    'title' => 'Menu Item',
                ],
            ],
            'mods' => 'menuitems',
            'vendors' => Vendor::all(),
            'categories' => Category::all(),
        ];
        return view('admins.menu.index', $data);
    }

    public function getData()
    {
        return DataTables::of(MenuItem::with(['vendor', 'category'])->get())->make();
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $request->validate([
                'name' => 'required',
                'eng_name' => 'required',
                'description' => 'required',
                'eng_description' => 'required',
                'vendor_id' => 'required',
                'category_id' => 'required',
                'price' => 'required',
            ]);

            MenuItem::create($request->only(['name', 'eng_name', 'description', 'eng_description', 'vendor_id', 'category_id', 'price']));
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
    public function update(MenuItem $menuItem, Request $request)
    {
        DB::beginTransaction();
        try{
            $request->validate([
                'name' => 'required',
                'eng_name' => 'required',
                'description' => 'required',
                'eng_description' => 'required',
                'vendor_id' => 'required',
                'category_id' => 'required',
                'price' => 'required',
            ]);

            $menuItem->update($request->only(['name', 'eng_name', 'description', 'eng_description', 'vendor_id', 'category_id', 'price']));
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

    public function destroy(MenuItem $menuItem)
    {
        try {
            $menuItem->delete();

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
