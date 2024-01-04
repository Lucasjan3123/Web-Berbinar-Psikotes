<?php

namespace App\Http\Controllers;

use App\Http\Requests\JawabanRequest;
use App\Http\Resources\JawabanResource;
use App\Models\Jawaban;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:api');
    }
         
    public function store(JawabanRequest $request)
    {

        if (auth()->check()){

            $jawabanData = $request->input('jawaban');
        
            $jawaban = collect($jawabanData)->map(function ($jawabanItem) {
               //  $jawabanItem['soal_id'] = $jawabanItem['soal_id'];
                // Mengganti nilai yang kosong dengan null
                $jawabanItem['opsi_pilihan_ganda_id'] = $jawabanItem['opsi_pilihan_ganda_id'] ?? null;
                $jawabanItem['jawaban_statement_id'] = $jawabanItem['jawaban_statement_id'] ?? null;
                $jawabanItem['jawaban_essay'] = $jawabanItem['jawaban_essay'] ?? null;
                $jawabanItem['jawaban_berupa_angka'] = $jawabanItem['jawaban_berupa_angka'] ?? null;
                $jawabanItem['user_id'] = auth()->user()->id;
        
                return Jawaban::create($jawabanItem);
            });
        
            // Jika perlu, Anda bisa langsung memberikan data jawaban sebagai respons
            $jawabanResource = JawabanResource::collection($jawaban);
        
            return $this->sendResponse($jawabanResource, 'Semua Jawaban sudah berhasil Insert');
        }else {
            // Handle jika pengguna tidak terotentikasi
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
    
     

    public function update( $test_id, JawabanRequest $request)
    {
        $jawabanData = $request->input('jawaban');

        // Mendapatkan semua soal_id yang perlu diupdate
        $soalIds = collect($jawabanData)->pluck('soal_id')->toArray();

        // Mendapatkan jawaban yang perlu diupdate berdasarkan soal_id, user_id, dan test_id
        $jawabanToUpdate = Jawaban::whereIn('soal_id', $soalIds)
            ->where('user_id', auth()->user()->id) // Memastikan hanya pengguna dengan user_id yang sesuai yang dapat melakukan update
            ->whereHas('soal', function ($query) use ($test_id) {
                $query->where('test_id', $test_id);
            })
            ->get();

        // Iterasi melalui jawaban yang perlu diupdate
        $jawabanToUpdate->each(function ($jawaban) use ($jawabanData) {
            // Mendapatkan data jawaban yang sesuai dari input
            $jawabanItem = collect($jawabanData)->firstWhere('soal_id', $jawaban->soal_id);

            // Jika data jawaban ditemukan, update nilai-nilainya
            if ($jawabanItem) {
                $jawaban->update([
                    'opsi_pilihan_ganda_id' => $jawabanItem['opsi_pilihan_ganda_id']?? null,
                    'jawaban_statement_id' => $jawabanItem['jawaban_statement_id'] ?? null,
                    'jawaban_essay' => $jawabanItem['jawaban_essay'] ?? null,
                    'jawaban_berupa_angka' => $jawabanItem['jawaban_berupa_angka'] ?? null,
                ]);
            }
        });

        // Jika perlu, Anda bisa langsung memberikan data jawaban sebagai respons
        $jawabanResource = JawabanResource::collection($jawabanToUpdate);

        return $this->sendResponse($jawabanResource, 'Semua Jawaban sudah berhasil diupdate');
    }



    public function GetJawaban (string $test_id){
        $jawaban = Jawaban::where('user_id', auth()->user()->id)
        ->whereHas('soal', function ($query) use ($test_id) {
            $query->where('test_id', $test_id);
        })
        ->get();

    // Jika tidak ditemukan jawaban
    if ($jawaban === null) {
        return response()->json(['message' => 'Tidak ada jawaban ditemukan'], 404);
    }

    
    $jawabanResource = JawabanResource::collection($jawaban);
                return $this->sendResponse($jawabanResource, 'Successfully getAll data!');
    }
    


   /**
    * Remove the specified resource from storage.
    */
    public function destroy($test_id)
    {
        // Mendapatkan jawaban berdasarkan test_id dan user_id
        $jawabanToDelete = Jawaban::where('user_id', auth()->user()->id)
            ->whereHas('soal', function ($query) use ($test_id) {
                $query->where('test_id', $test_id);
            })
            ->get();

        // Menghapus jawaban
        foreach ($jawabanToDelete as $jawaban) {
            $jawaban->delete();
        }


        return $this->sendResponse('', 'Semua jawaban berhasil dihapus');
    }

    
}
