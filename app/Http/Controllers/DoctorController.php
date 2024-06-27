<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\Speciality;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('backend.doctor.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialities = Speciality::all();
        $userGender = config('mvp.GENDER');
        return view('backend.doctor.create', compact('specialities', 'userGender'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|string|email|max:255|unique:doctors',
            'password' => 'required|min:6',
            'gender' => 'required',
            'qualification' => 'required',
            'speciality' => 'required',
            'phone' => 'required|min:6',
        ]);

        $doctor = Doctor::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
            'qualification' => $request->qualification,
            'speciality' => $request->speciality,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        if ($doctor) {
            flash('New record created successfully')->success();
        } else {
            flash('Record could not be created. Please try again.')->error();
        }

        return redirect()->route('backend.doctor.index');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $specialities = Speciality::all();
        $userGender = config('mvp.GENDER');
        $doctorDetail = Doctor::findorfail($id);
        return view('backend.doctor.view', compact('doctorDetail', 'specialities', 'userGender'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $specialities = Speciality::all();
        $userGender = config('mvp.GENDER');
        $doctorDetail = Doctor::findorfail($id);
        return view('backend.doctor.edit', compact('doctorDetail', 'specialities', 'userGender'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:doctors,email,' . $id,
            'gender' => 'required',
            'qualification' => 'required',
            'speciality' => 'required',
            'phone' => 'required|min:6',

        ]);

        if (!empty($request->password)) {
            $this->validate($request, [
                'password' => 'required|min:6',
            ]);
        }

        $doctor = Doctor::findorfail($id);

        $doctor->fill([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'gender' => $request->gender,
            'qualification' => $request->qualification,
            'speciality' => $request->speciality,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        if (!empty($request->password)) {
            $doctor->fill([
                'password' => $request->password ? bcrypt($request->password) : $doctor->password,
            ]);
        }

        $doctor->save();

        // upload images
        //$this->uploadImage($request, $product->id);

        if ($doctor) {
            flash('Record updated successfully')->success();
        } else {
            flash('Record could not be updated. Please try again.')->error();
        }

        return redirect()->route('backend.doctor.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::findorfail($id);

        if ($doctor->delete()) {
            flash('Record deleted successfully')->success();
        } else {
            flash('Record could not be deleted. Please try again.')->error();
        }

        return redirect()->route('backend.doctor.index');
    }
}
