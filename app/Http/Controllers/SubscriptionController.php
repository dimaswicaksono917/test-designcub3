<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{

    public function index()
    {
        $subscriptions = Subscription::all();
        return view('subscriptions', compact('subscriptions'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|min:10|email',
        ]);

        Subscription::create([
            'email' => $request->email,
            'ip' => $request->ip(),
        ]);

        return redirect()->back()->with('success', 'Subscription berhasil! Terima kasih atas partisipasinya.');
    }


    public function destroy($id)
    {
        $subscriptions = Subscription::find($id);
        $subscriptions->delete();

        if ($subscriptions) {

            return redirect()->route('subscriptions.index')->with(['type' => 'success', 'message' => 'Berhasil Hapus Data']);
        }

        return redirect()->route('subscriptions.index')->with(['type' => 'danger', 'message_error' => 'Gagal Hapus Data']);
    }
}
