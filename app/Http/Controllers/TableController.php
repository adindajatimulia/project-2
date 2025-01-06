<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;

class TableController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Table',
            'breadcrumbs' => [
                [
                    'title' => 'Dashboard',
                ],
                [
                    'title' => 'Table',
                ],
            ],
            'mods' => 'tables',
        ];
        return view('admins.table.index', $data);
    }

    public function getData()
    {
        return DataTables::of(Table::all())->make();
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $request->validate([
                'table_code' => 'required',
            ]);

            Table::create($request->only(['table_code']));
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
    public function update(Table $table, Request $request)
    {
        DB::beginTransaction();
        try{
            $request->validate([
                'table_code' => 'required',
            ]);

            $table->update($request->only(['table_code']));
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

    public function destroy(Table $table)
    {
        try {
            $table->delete();

            return response()->json([
                'message' => 'Successfully deleted'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Oops! An error occurred, please check again!',
            ], 500);
        }
    }

    public function print(Request $request)
    {
        if (isset($request->code)) {
            $table = Table::where('table_code', $request->code)->first();
            if ($table) {
                $qr[] = [
                    'code' => $table->table_code,
                    'qr' => 'data:image/png;base64,' . base64_encode(QrCode::size(300)->generate(route('orders', $table->table_code))),
                ];
            } else {
                $qr = [];
            }
    
        } else {
            $tables = Table::all();
            $qr = [];
    
            foreach ($tables as $table) {
                $qr[] = [
                    'code' => $table->table_code,
                    'qr' => 'data:image/png;base64,' . base64_encode(QrCode::size(300)->generate(route('orders', $table->table_code))),
                ];
            }
        }

        $data = [
            'title' => 'Print QR Code',
            'data' => $qr,
        ];
        $pdf = Pdf::loadView('admins.table.print', $data);
        return $pdf->stream('qrcode_table.pdf');
    }
    
}
