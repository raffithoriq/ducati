<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class crudusercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = Pelanggan::all(); // Mengambil semua pelanggan
        return view('pages.pelanggan.adminpelanggan', [
            "title" => "User",
            "titleadmin" => "User",
            "pelanggan" => $pelanggan // Pastikan ini adalah koleksi dari model Pelanggan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'pages.pelanggan.addpelanggan',
            [
                "title" => "Users",
                "titleadmin" => "Add Users"
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gender' => 'required',
            'email' => 'required|email',
            'callnumber' => 'required|numeric',
            'address' => 'required'
        ]);


        $data = [
            'nama_lengkap' => $request->input('fullname'),
            'foto_profil' => $request->file('image')->store('image'),
            'jenis_kelamin' => $request->input('gender'),
            'email' => $request->input('email'),
            'no_hp' => $request->input('callnumber'),
            'alamat' => $request->input('address')
        ];

        Pelanggan::create($data);
        return redirect('/admin/pelanggan')->with('success', 'User Added');
    }


    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $Pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $Pelanggan)
    {
        return view('pages.pelanggan.editpelanggan', [
            'title' => 'Edit Pelanggan',
            'titleadmin' => 'Edit Pelanggan',
            'pelanggan' => $Pelanggan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $Pelanggan)
    {
        $request->validate([
            'fullname' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Make image optional
            'gender' => 'required',
            'email' => 'required|email',
            'callnumber' => 'required|numeric',
            'address' => 'required'
        ]);

        // Prepare the data for update
        $data = [
            'nama_lengkap' => $request->input('fullname'),
            'jenis_kelamin' => $request->input('gender'),
            'email' => $request->input('email'),
            'no_hp' => $request->input('callnumber'),
            'alamat' => $request->input('address')
        ];

        // Only add the image if it was uploaded
        if ($request->hasFile('image')) {
            $data['foto_profil'] = $request->file('image')->store('image');
        }

        // Update the Pelanggan instance
        $Pelanggan->update($data);

        // Redirect to the edit page with a success message
        return redirect()->route('admin.pelanggan.edit', $Pelanggan->id)->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $Pelanggan)
    {
        $Pelanggan->delete();
        return redirect('/admin/pelanggan')->with('success', 'Category deleted successfully');
    }
}
