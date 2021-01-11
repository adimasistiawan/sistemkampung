<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\PendudukDetail;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function index(){
        $pekerjaan = DB::table('penduduk_detail')->join('pekerjaan','penduduk_detail.pekerjaan_id','pekerjaan.id')
                    ->select(
                        'pekerjaan.nama as pekerjaan',
                        \DB::raw('COUNT(penduduk_detail.id) as qty'),
                        'pekerjaan.warna'
                    )
                    ->groupBy('pekerjaan.nama')
                    ->where('pekerjaan.is_delete',0)
                    ->get();
        $pendidikan = DB::table('penduduk_detail')
                    ->select(
                        'pendidikan',
                        \DB::raw('COUNT(id) as qty'),
                    )
                    ->groupBy('pendidikan')
                    ->get();
        $agama = DB::table('penduduk_detail')
                    ->select(
                        'agama',
                        \DB::raw('COUNT(id) as qty'),
                    )
                    ->groupBy('agama')
                    ->get();
        $umur = [ // the start of each age-range.
                        '0-4' => 0,
                        '5-9' => 0,
                        '10-14' => 0,
                        '15-19' => 0,
                        '20-24' => 0,
                        '25-29' => 0,
                        '30-34' => 0,
                        '35-39' => 0,
                        '40-44' => 0,
                        '45-49' => 0,
                        '50-54' => 0,
                        '55-59' => 0,
                        '60-64' => 0,
                        '65-69' => 0,
                        '70-74' => 0,
                        '75+' => 0,
                    ];
                
    $data = PendudukDetail::all();
        foreach($data as $key => $value)
        {
            $age = Carbon::parse($value->tanggal_lahir)->age;
            if ($age >= 0 && $age <= 4)
            {
                $umur['0-4'] += 1;
                
            }
            else if ($age >= 5 && $age <= 9)
            {
                $umur['5-9'] += 1;
                
            }
            else if ($age >= 10 && $age <= 14)
            {
                $umur['10-14'] += 1;
                
            }
            else if ($age >= 15 && $age <= 19)
            {
                $umur['15-19'] += 1;
                
            }
            else if ($age >= 20 && $age <= 24)
            {
                $umur['20-24'] += 1;
                
            }
            else if ($age >= 25 && $age <= 29)
            {
                $umur['25-29'] += 1;
                
            }
            else if ($age >= 30 && $age <= 34)
            {
                $umur['30-34'] += 1;
                
            }
            else if ($age >= 35 && $age <= 39)
            {
                $umur['35-39'] += 1;
                
            }
            else if ($age >= 40 && $age <= 44)
            {
                $umur['40-44'] += 1;
                
            }
            else if ($age >= 45 && $age <= 49)
            {
                $umur['45-49'] += 1;
                
            }
            else if ($age >= 50 && $age <= 54)
            {
                $umur['50-54'] += 1;
                
            }
            else if ($age >= 55 && $age <= 59)
            {
                $umur['55-59'] += 1;
                
            }
            else if ($age >= 60 && $age <= 64)
            {
                $umur['60-64'] += 1;
                
            }
            else if ($age >= 65 && $age <= 69)
            {
                $umur['65-69'] += 1;
                
            }
            else if ($age >= 70 && $age <= 74)
            {
                $umur['70-74'] += 1;
                
            }
            else if ($age >= 75)
            {
                $umur['75+'] += 1;
                
            }
        }
        $jmlpenduduk = PendudukDetail::all()->count();
        
        return view('admin.dashboard',compact('pekerjaan','jmlpenduduk','pendidikan','agama','umur'));
    }
    public function chartdonut(){
        $pekerjaan = DB::table('penduduk_detail')->join('pekerjaan','penduduk_detail.pekerjaan_id','pekerjaan.id')
                                    ->select(
                                        'pekerjaan.nama as pekerjaan',
                                        \DB::raw('COUNT(penduduk_detail.id) as qty'),
                                        'pekerjaan.warna'
                                    )
                                    ->groupBy('pekerjaan.nama')
                                    ->where('pekerjaan.is_delete',0)
                                    ->get();
        $pendidikan = DB::table('penduduk_detail')
                                    ->select(
                                        'pendidikan',
                                        \DB::raw('COUNT(id) as qty'),
                                    )
                                    ->groupBy('pendidikan')
                                    ->get();
        $agama = DB::table('penduduk_detail')
                                    ->select(
                                        'agama',
                                        \DB::raw('COUNT(id) as qty'),
                                    )
                                    ->groupBy('agama')
                                    ->get();
    $umur = [ // the start of each age-range.
        '0-4' => 0,
        '5-9' => 0,
        '10-14' => 0,
        '15-19' => 0,
        '20-24' => 0,
        '25-29' => 0,
        '30-34' => 0,
        '35-39' => 0,
        '40-44' => 0,
        '45-49' => 0,
        '50-54' => 0,
        '55-59' => 0,
        '60-64' => 0,
        '65-69' => 0,
        '70-74' => 0,
        '75+' => 0,
    ];

    $data = PendudukDetail::all();
        foreach($data as $key => $value)
        {
            $age = Carbon::parse($value->tanggal_lahir)->age;
            if ($age >= 0 && $age <= 4)
            {
                $umur['0-4'] += 1;
                
            }
            else if ($age >= 5 && $age <= 9)
            {
                $umur['5-9'] += 1;
                
            }
            else if ($age >= 10 && $age <= 14)
            {
                $umur['10-14'] += 1;
                
            }
            else if ($age >= 15 && $age <= 19)
            {
                $umur['15-19'] += 1;
                
            }
            else if ($age >= 20 && $age <= 24)
            {
                $umur['20-24'] += 1;
                
            }
            else if ($age >= 25 && $age <= 29)
            {
                $umur['25-29'] += 1;
                
            }
            else if ($age >= 30 && $age <= 34)
            {
                $umur['30-34'] += 1;
                
            }
            else if ($age >= 35 && $age <= 39)
            {
                $umur['35-39'] += 1;
                
            }
            else if ($age >= 40 && $age <= 44)
            {
                $umur['40-44'] += 1;
                
            }
            else if ($age >= 45 && $age <= 49)
            {
                $umur['45-49'] += 1;
                
            }
            else if ($age >= 50 && $age <= 54)
            {
                $umur['50-54'] += 1;
                
            }
            else if ($age >= 55 && $age <= 59)
            {
                $umur['55-59'] += 1;
                
            }
            else if ($age >= 60 && $age <= 64)
            {
                $umur['60-64'] += 1;
                
            }
            else if ($age >= 65 && $age <= 69)
            {
                $umur['65-69'] += 1;
                
            }
            else if ($age >= 70 && $age <= 74)
            {
                $umur['70-74'] += 1;
                
            }
            else if ($age >= 75)
            {
                $umur['75+'] += 1;
                
            }
        }
        return ['pekerjaan' => $pekerjaan,'pendidikan' => $pendidikan,'agama' => $agama, 'umur' => $umur];
    }
}
