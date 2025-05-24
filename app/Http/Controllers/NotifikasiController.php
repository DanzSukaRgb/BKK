<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    /**
     * Menampilkan daftar notifikasi pengguna
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $tipe = $request->input('tipe');
        $status = $request->input('status');

        $notifikasi = Notifikasi::where('user_id', $user->id)
            ->when($search, function ($query) use ($search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('judul', 'like', "%$search%")
                      ->orWhere('pesan', 'like', "%$search%");
                });
            })
            ->when($tipe, function ($query) use ($tipe) {
                return $query->where('tipe', $tipe);
            })
            ->when($status === 'unread', function ($query) {
                return $query->where('dibaca', false);
            })
            ->when($status === 'read', function ($query) {
                return $query->where('dibaca', true);
            })
            ->latest()
            ->paginate($perPage);

        return view('notifikasi.index', [
            'notifikasi' => $notifikasi,
            'search' => $search,
            'tipe' => $tipe,
            'status' => $status,
        ]);
    }

    /**
     * Menandai notifikasi sebagai dibaca
     */
    public function markAsRead($id)
    {
        $notifikasi = Notifikasi::where('user_id', Auth::id())
            ->findOrFail($id);

        $notifikasi->markAsRead();

        return redirect()->to($notifikasi->link ?? route('notifikasi.index'))
            ->with('success', 'Notifikasi ditandai sebagai dibaca');
    }

    /**
     * Menandai semua notifikasi sebagai dibaca
     */
    public function markAllAsRead()
    {
        Notifikasi::where('user_id', Auth::id())
            ->where('dibaca', false)
            ->update(['dibaca' => true]);

        return back()->with('success', 'Semua notifikasi ditandai sebagai dibaca');
    }

    /**
     * Menghapus notifikasi
     */
    public function destroy($id)
    {
        $notifikasi = Notifikasi::where('user_id', Auth::id())
            ->findOrFail($id);

        $notifikasi->delete();

        return back()->with('success', 'Notifikasi berhasil dihapus');
    }

    /**
     * Menghapus semua notifikasi yang sudah dibaca
     */
    public function clearRead()
    {
        Notifikasi::where('user_id', Auth::id())
            ->where('dibaca', true)
            ->delete();

        return back()->with('success', 'Notifikasi yang sudah dibaca berhasil dihapus');
    }

    /**
     * Mendapatkan jumlah notifikasi yang belum dibaca (API)
     */
    public function unreadCount()
    {
        $count = Notifikasi::where('user_id', Auth::id())
            ->where('dibaca', false)
            ->count();

        return response()->json([
            'success' => true,
            'count' => $count
        ]);
    }

    /**
     * Mendapatkan notifikasi terbaru (API)
     */
    public function latestNotifications()
    {
        $notifikasi = Notifikasi::where('user_id', Auth::id())
            ->with('user')
            ->latest()
            ->take(5)
            ->get();

        return response()->json([
            'success' => true,
            'notifications' => $notifikasi
        ]);
    }
}