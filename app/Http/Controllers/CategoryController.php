<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Category',
            'breadcrumbs' => [
                [
                    'title' => 'Dashboard',
                ],
                [
                    'title' => 'Category',
                ],
            ],
            'mods' => 'categories',
        ];
        return view('admins.category.index', $data);
    }

    public function getData()
    {
        return DataTables::of(Category::all())->make();
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $request->validate([
                'name' => 'required',
                'eng_name' => 'required',
            ]);

            Category::create($request->only(['name', 'eng_name']));
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
    public function update(Category $category, Request $request)
    {
        DB::beginTransaction();
        try{
            $request->validate([
                'name' => 'required',
                'eng_name' => 'required',
            ]);

            $category->update($request->only(['name', 'eng_name']));
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

    public function destroy(Category $category)
    {
        try {
            if($category->menuItem->count() > 0){
                return response()->json([
                    'message' => 'You have Menu Item with this Category!',
                ], 500);
            }

            $category->delete();

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
