<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    //Menampilkan Data Ruang
    public function viewRooms(): View
    {
        //Tampil berdasar urut NOMOR RUANG
        $room = Room::orderBy('no_ruang', 'ASC')->paginate();

        //Menampilkan Ruang
        return view('rooms.viewRooms', compact('room'));
    }

    //Method tambah Ruang
    public function createRoom(): View
    {
        //Mengambil Ruang
        $room = Room::get();
        //Menampilkan Ruang
        return view('rooms.createRoom', compact('room'));
    }

    //Menangkap Data
    public function storeRoom(Request $request)
    {
        //Melakukan Validasi Inputan
        $validator = Validator::make($request->all(), [
            'no_ruang'      => 'required',
            'gedung'        => 'required|max:1',
            'nama_ruang'    => 'required',
            'kategori'      => 'required|in:Kantor,Kelas,Fasilitas Umum',
            'luas'          => 'required',
            'foto_depan'    => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'foto_ruang'    => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        //Jika Error Kembali Membawa Nilai dan Pesan Error
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        //Simpan Foto Depan
        $foto_depan = $request->file('foto_depan');
        //Memberikan Nama Gambar
        $filedepan = date('Y-m-d') . $foto_depan->getClientOriginalName();
        //Lokasi Penyimpanan Gambar
        $path = 'rooms/' . $filedepan;
        // Simpan File
        Storage::disk('public')->put($path, file_get_contents($foto_depan));

        //Foto Ruang
        $foto_ruang = $request->file('foto_ruang');
        //Memberikan Nama Gambar
        $fileruang = date('Y-m-d') . $foto_ruang->getClientOriginalName();
        //Lokasi Penyimpanan Gambar
        $path = 'rooms/' . $fileruang;
        // Simpan File
        Storage::disk('public')->put($path, file_get_contents($foto_ruang));

        //Menyimpan Data
        $room['no_ruang']      = $request->no_ruang;
        $room['gedung']        = $request->gedung;
        $room['nama_ruang']    = $request->nama_ruang;
        $room['kategori']      = $request->kategori;
        $room['luas']          = $request->luas;
        $room['foto_depan']    = $filedepan;
        $room['foto_ruang']    = $fileruang;

        //Membuat Ruang baru
        Room::create($room);

        //Data Ruang Berhasil Ditambahkan
        session()->flash('success', 'Data berhasil ditambahkan.');

        //Kembali ke view-rooms
        return redirect()->route('view-rooms')->with(['succes' => 'Data Berhasil Disimpan!']);
    }

    public function editRoom(Request $request, $id)
    {
        //Mencari Berdasarkan ID
        $room = Room::findOrFail($id);
        //Memilih Berdasarkan Field Kategori
        $kategori = DB::select("SHOW COLUMNS FROM rooms WHERE Field = 'kategori'")[0]->Type;
        preg_match('/^enum\((.*)\)$/', $kategori, $matches);
        //Membuat Nilai Enum
        $enumValues = [];
        foreach (explode(',', $matches[1]) as $value) {
            $enumValues[] = trim($value, "'");
        }

        //Mengarah Pada edit-room
        return view('rooms.editRoom', compact('room', 'enumValues'));
    }

    public function updateRoom(Request $request, $id)
    {
        //Melakukan Validasi Inputan
        $validator = validator::make($request->all(), [
            'no_ruang'      => 'required',
            'gedung'        => 'required|max:1',
            'nama_ruang'    => 'required',
            'kategori'      => 'required|in:Kantor,Kelas,Fasilitas Umum',
            'luas'          => 'required',
            'foto_depan'    => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'foto_ruang'    => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        //Jika Error Kembali Membawa Nilai dan Pesan Error
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        //Mencari Berdasarkan ID
        $room = Room::findOrFail($id);

        //Update Foto Depan
        $foto_depan = $request->file('foto_depan');
        //Periksa File Sebelumnya
        if ($foto_depan) {
            $filedepan = date('Y-m-d') . $foto_depan->getClientOriginalName();
            $path = 'rooms/' . $filedepan;

            //Hapus File Sebelumnya
            if ($room->foto_depan) {
                Storage::disk('public')->delete('rooms/' . $room->foto_depan);
            }

            //Simpan File Baru
            Storage::disk('public')->put($path, file_get_contents($foto_depan));

            $room['foto_depan'] = $filedepan;
        }


        //Update Foto Ruang
        $foto_ruang = $request->file('foto_ruang');
        //Periksa File Sebelumnya
        if ($foto_ruang) {
            $fileruang = date('Y-m-d') . $foto_ruang->getClientOriginalName();
            $path = 'rooms/' . $fileruang;

            //Hapus File Sebelumnya
            if ($room->foto_ruang) {
                Storage::disk('public')->delete('rooms/' . $room->foto_ruang);
            }

            //Menyimpan File Baru
            Storage::disk('public')->put($path, file_get_contents($foto_ruang));

            $room['foto_ruang'] = $fileruang;
        }

        //Update Data
        $room['no_ruang']      = $request->no_ruang;
        $room['gedung']        = $request->gedung;
        $room['nama_ruang']    = $request->nama_ruang;
        $room['kategori']      = $request->kategori;
        $room['luas']          = $request->luas;

        $room->save();

        //Berhasil
        session()->flash('success', 'Data berhasil diubah.');

        //Kembali ke view-rooms
        return redirect()->route('view-rooms')->with(['succes' => 'Data Berhasil Diubah!']);
    }

    //Menghapus Data
    public function destroyRoom($id): RedirectResponse
    {
        //Ambil Data Ruang berdasarkan ID
        $room = Room::findOrFail($id);

        //Hapus File Gambar
        Storage::disk('public')->delete('rooms/' . $room->foto_depan);
        //Hapus File Gambar
        Storage::disk('public')->delete('rooms/' . $room->foto_ruang);

        //Hapus Data Ruang
        $room->delete();

        //Berhasil
        session()->flash('success', 'Data berhasil dihapus.');

        //Kembali ke view-rooms
        return redirect()->route('view-rooms')->with(['success' => 'Data Berhasil Dihapus!']);;
    }

    public function viewByCategoryRoom($category): View
    {
        //Ambil Data Berdasarkan Kategori
        $room = Room::where('kategori', $category)->get();
        //Tampilkan 
        return view('rooms.viewCategory', compact('room', 'category'));
    }
}
