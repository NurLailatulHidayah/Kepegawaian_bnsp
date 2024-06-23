<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kepegawaian;

class KepegawaianController extends Controller
{
    public function index()
    {
        // $kepegawaian = Kepegawaian::select(['id', 'nama', 'email', 'posisi', 'gaji', 'tgl_rekrutmen']);

        // return datatables()->of($kepegawaian)
        //     ->addColumn('action', function ($row) {
        //         return view('pegawai-action', ['id' => $row->id])->render();
        //     })
        //     ->make(true);
        if (request()->ajax()) {
            return datatables()->of(Kepegawaian::select('*'))
                ->addColumn('action', 'pegawai-action')
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" onClick="editFunc(' . $row->id . ')" data-original-title="Edit" class="edit btn btn-success btn-sm edit">Edit</a>';
                    $btn .= ' <a href="javascript:void(0);" id="delete-company" onClick="deleteFunc(' . $row->id . ')" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                // ->rawColumns(['action'])
                // ->addIndexColumn()
                ->make(true);
        }
        return view('index');
    }

    public function store(Request $request)
    {
        $kepegawaianId = $request->id;

        $kepegawaian = Kepegawaian::updateOrCreate(
            [
                'id' => $kepegawaianId
            ],
            [
                'nama' => $request->nama,
                'email' => $request->email,
                'posisi' => $request->posisi,
                'gaji' => $request->gaji,
                'tgl_rekrutmen' => $request->tgl_rekrutmen
            ]
        );
        return Response()->json($kepegawaian);
    }
    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $kepegawaian  = Kepegawaian::where($where)->first();

        return Response()->json($kepegawaian);
    }

    public function destroy(Request $request)
    {
        $kepegawaian = Kepegawaian::where('id', $request->id)->delete();

        return Response()->json($kepegawaian);
    }

    public function detail(Request $request)
    {
        $kepegawaian = Kepegawaian::findOrFail($request->id);
        return response()->json($kepegawaian);
    }
}
