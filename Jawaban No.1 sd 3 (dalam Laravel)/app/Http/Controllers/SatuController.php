<?php

namespace App\Http\Controllers;

use App\Models\{
    Task,
    ViewHasilA,
    ViewHasilB,
    ViewHasilC
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    DB
};

class SatuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*Hasil A*/
        $hasilA = Task::join('sites as s', 'tasks.site_id', '=', 's.site_id')
            ->select('s.area', 'tasks.vendor', DB::raw('count(*) as jumlah_task'))
            ->groupBy('s.area', 'tasks.vendor')
            ->orderBy('s.area')
            ->orderBy('tasks.vendor')
            ->get();

        //or with SQL View
        $hasilAfromSQLView = ViewHasilA::get();
        /*End Hasil A*/

        /*Hasil B*/
        $hasilB = [];
        foreach ($hasilA as $task) {
            $area = $task->area;
            $vendor = $task->vendor;
            $jumlah_task = $task->jumlah_task;

            if (!isset($hasilB[$area])) {
                $hasilB[$area] = [];
            }

            $hasilB[$area][$vendor] = $jumlah_task;
        }

        //or with SQL View
        $callFunction = DB::select('CALL generate_view_hasil_b_no_satu()');
        $hasilBfromSQLView = ViewHasilB::get();
        /*End Hasil B*/

        /*Hasil C*/
        $hasilC = Task::join('sites as s', 'tasks.site_id', '=', 's.site_id')
            ->select('s.area', DB::raw('count(*) as all_task'))
            ->groupBy('s.area')
            ->orderBy('s.area')
            ->get();

        //or with SQL View
        $hasilCfromSQLView = ViewHasilC::get();
        /*End Hasil C*/

        return view('Satu.index', [
            'hasilA' => $hasilAfromSQLView,
            'hasilB' => $hasilBfromSQLView,
            'hasilC' => $hasilCfromSQLView,
            'pieChart' => $hasilC
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
