<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $students = Student::all();
        // return view('students.index', compact('students'));
        $students = Student::latest()->paginate(10);
        return view('students.index', compact('students'))
        ->with('i', (request()->input('page', 1) -1) *10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'last_name' => 'required|min:3|max:150',
            'ci' => 'required|min:5|max:50',
            'phone' => 'required|min:8|max:50',
            'email' => 'required|min:15|max:100',
        ],
        [
            'name.required' => 'Nombre del estudiante es requerido.',
            'last_name.required' => 'Apellidos del estudiante son requeridos.',
            'ci.required' => 'C.I. del estudiante es requerido.',
            'phone.required' => 'Teléfonos del estudiante son requeridos.',
            'email.required' => 'Correo electrónico del estudiante es requerido.',
            'name.min' => 'Nombre del estudiante debe tener 3 o más caracteres.',
            'last_name.min' => 'Apellidos del estudiante debe tener a 3 o más caracteres.',
            'ci.min' => 'C.I. del estudiante debe tener 5 o más caracteres.',
            'phone.min' => 'Celular del estudiante debe tener 8 o más dígitos.',
            'email.min' => 'Correo electrónico del estudiante debe tener 15 o más dígitos.',
        ]);

        $student = $request->post();

        Student::create($student);

        return redirect()->route('students.index')->with('success', 'Estudiante creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);

        return view('students.show', compact('student'))->with('info', 'Estudiante recuperado exitosamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);

        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'last_name' => 'required|min:3|max:150',
            'ci' => 'required|min:3|max:50',
            'phone' => 'required|min:8|max:50',
            'email' => 'required|min:20|max:100',
        ],
        [
            'name.required' => 'Nombre del estudiante es requerido.',
            'last_name.required' => 'Apellidos del estudiante son requeridos.',
            'ci.required' => 'C.I. del estudiante es requerido.',
            'phone.required' => 'Teléfonos del estudiante son requeridos.',
            'email.required' => 'Correo electrónico del estudiante es requerido.',
            'name.min' => 'Nombre del estudiante debe tener 3 o más caracteres.',
            'last_name.min' => 'Apellidos del estudiante debe tener a 3 o más caracteres.',
            'ci.min' => 'C.I. del estudiante debe tener 5 o más caracteres.',
            'phone.min' => 'Celular del estudiante debe tener 8 o más dígitos.',
            'email.min' => 'Correo electrónico del estudiante debe tener 15 o más dígitos.',
        ]);

        $student = Student::find($id);

        $student->update($request->post());
 
        return redirect()->route('students.index')->with('primary', 'Estudiante modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);

        $student->delete();

        return redirect()->route('students.index')->with('danger', 'Estudiante eliminado exitosamente');
    }
}
