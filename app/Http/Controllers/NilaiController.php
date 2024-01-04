<?php

namespace App\Http\Controllers;

use App\Http\Requests\NilaiRequest;
use App\Http\Resources\NilaiResource;
use App\Models\Jawaban;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function GetNilaiByTes($id){
        try {
         
            // Find the nilai record based on test_id and user_id
            $nilai = Nilai::where('test_id', $id)
                ->where('user_id',auth()->user()->id )
                ->first();

            if (!$nilai) {
                return $this->sendError('Nilai not found', 'Nilai not found for the specified test and user.');
            }

            // Return the nilai using the resource file
            $nilaiResource = new NilaiResource($nilai);
            return $this->sendResponse($nilaiResource, 'Successfully get data nilai by test_id and user_id.');
        } catch (\Exception $e) {
            return $this->sendError('Error', $e->getMessage());
        }
    }
    public function calculateScore(NilaiRequest $request)
    {
        $data = $request->validated();
    
        $user_id = auth()->user()->id;
        $test_id = $data['test_id'];
    
        $jawabanIds = Jawaban::whereHas('soal', function ($query) use ($test_id) {
            $query->where('test_id', $test_id);
        })->where('user_id', $user_id)->pluck('id')->toArray();
    
        // Jumlahkan skor dari kedua jenis jawaban
        $totalScore = $this->calculateTotalScore($user_id, $test_id);
    
        $jawabanIdsString = implode(',', $jawabanIds);
    

        // Simpan atau Update Skor di Tabel Nilai
        $nilai = Nilai::updateOrCreate(
            ['user_id' => $user_id, 'test_id' => $test_id],
            ['jawaban_id' => $jawabanIdsString, 'score' => $totalScore, 'status' => $totalScore ? 'selesai' : null]
        );
    
        $NilaiResource = new NilaiResource($nilai);
        return $this->sendResponse($NilaiResource, 'Skor berhasil dihitung dan disimpan');
    }
    

    private function calculateTotalScore($user_id, $test_id)
    {
        // Hitung Skor dari Option Pilihan Ganda
        $skorOption = Jawaban::join('opsi_pilihan_ganda', 'jawaban.opsi_pilihan_ganda_id', '=', 'opsi_pilihan_ganda.id')
            ->whereHas('soal', function ($query) use ($test_id) {
                $query->where('test_id', $test_id)
                    ->where(function ($query) {
                        $query->whereNull('jawaban_essay')
                              ->orWhereNull('jawaban_berupa_angka');
                    });
            })
            ->where('jawaban.user_id', $user_id)
            ->whereNotNull('opsi_pilihan_ganda.point') // Hanya hitung jika point tidak null
            ->sum('opsi_pilihan_ganda.point');
    
        // Hitung Skor dari Jawaban Statement
        $skorStatement = Jawaban::join('jawaban_statement', 'jawaban.jawaban_statement_id', '=', 'jawaban_statement.id')
            ->whereHas('soal', function ($query) use ($test_id) {
                $query->where('test_id', $test_id)
                    ->where(function ($query) {
                        $query->whereNull('jawaban_essay')
                              ->orWhereNull('jawaban_berupa_angka');
                    });
            })
            ->where('jawaban.user_id', $user_id)
            ->whereNotNull('jawaban_statement.point') // Hanya hitung jika point tidak null
            ->sum('jawaban_statement.point');
    
        return $skorOption + $skorStatement;
    }
         
    public function EditNilai(NilaiRequest $request,$id){
        $Nilai = Nilai::find($id);

        $Nilai ->test_id  = $request->test_id;
        $Nilai ->jawaban_id  = $request->jawaban_id;
        $Nilai ->user_id = $request->user_id;
        $Nilai ->score = $request->score;

        $Nilai ->save();

        $NilaiResource = new NilaiResource($Nilai);
        return $this->sendResponse($NilaiResource, 'Succesfully edit Nilai');

    }

    public function DeleteNilai($id){
        $Nilai = Nilai::find($id);
        $Nilai ->delete();

        return $this->sendResponse("", 'Succesfully Deleted Nilai');

    }
}
