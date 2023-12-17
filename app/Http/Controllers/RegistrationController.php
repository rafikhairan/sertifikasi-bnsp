<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRegistrationRequest;
use App\Models\Country;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Registration;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only(['approve', 'reject', 'destroy', 'index']);
        $this->middleware('student')->only(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registrations = Registration::all();

        return view('registrations.index', compact('registrations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where('id', auth()->user()->id)->first();

        if($user->registration !== null && $user->registration->registration_status !== 'Rejected') {
            return redirect()->route('registrations.show', $user->id)->with('error', 'Anda sudah melakukan pendaftaran, mohon tunggu update status pengajuan dari admin');
        }

        $provinces = Province::with('regencies')->get();
        $regencies = Regency::with('districts')->get();
        $districts = District::all();
        $countries = Country::all();
        
        return view('registrations.create', compact('user', 'provinces', 'regencies', 'districts', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRegistrationRequest $request)
    {
        $image = explode('.', $request->file('image')->getClientOriginalName())[0];
        $image = $image . '-' . time() . '.' . $request->file('image')->extension();
        $request->file('image')->storeAs('public/uploads/photos', $image);
        
        $data = $request->all();
        $data['image'] = 'photos/' . $image;
        $data['user_id'] = auth()->user()->id;
        
        if($request->has('wna')) {
            $data['citizenship'] = $request->citizenship . ' ' . $request->wna;
        }

        $registration = Registration::create($data);

        return redirect()->route('registrations.show', $registration->user_id)->with('success', 'Anda berhasil melakukan pendaftaran, mohon tunggu update status pengajuan dari admin');
    }

    /**
     * Display the specified resource.
     */
    public function show($user_id)
    {
        $registration = Registration::where('user_id', $user_id)->first();

        if($registration === null) {
            return redirect()->route('registrations.create')->with('error', 'Anda belum mendaftarkan sebagai mahasiswa baru, daftarkan dulu disini');
        }

        return view('registrations.show', compact('registration'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registration $registration)
    {
        $registration->delete();

        return redirect()->route('registrations.index')->with('success', 'Berhasil menghapus data pendaftaran mahasiswa');
    }

    public function approve(Registration $registration)
    {
        $registration->update([
            'registration_status' => 'Approved',
        ]);

        return redirect()->route('registrations.index')->with('success', 'Berhasil melakukan approve pendaftaran mahasiswa');
    }

    public function reject(Registration $registration)
    {
        $registration->update([
            'registration_status' => 'Rejected',
        ]);

        return redirect()->route('registrations.index')->with('success', 'Berhasil melakukan reject pendaftaran mahasiswa');
    }

    public function print(Registration $registration)
    {
        $pdf = Pdf::loadView('pdf.registration', [
            'registration' => $registration
        ]);
        
        return $pdf->download('Surat Penerimaaan Mahasiswa Baru.pdf');
    }
}
