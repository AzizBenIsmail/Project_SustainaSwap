<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class ComplaintsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $complaints = Complaint::orderBy('created_at', 'desc')->paginate(3);
        return view('complaints.index')->with('complaints', $complaints);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $complaint = Complaint::create([
            'userName' => $request->name,
            'userEmail' => $request->email,
            'emailSubject' => $request->subject,
            'emailMessage' => $request->message
        ]);
        if ($complaint) {
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Complaint $complaints
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaints)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Complaint $complaints
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaint $complaints)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Complaint $complaints
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Complaint $complaint)
    {
        try {
//            dd(Auth::user()->name);
//        dd($request->input('answered') == true);
            if ($request->input('answered') == "on") {
                $status = 1;
            } else {
                $status = 0;
            }
//           dd($status);
            $complaint->update([
                'status' => $status,
                'answeredBy' => Auth::user()->name
            ]);
            session()->flash('success', 'Complaint Status Updated');
            return redirect()->back();
        } catch (Exception $exception) {
            // Log or print the error message for debugging.
            dd($exception->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Complaint $complaints
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $complaint = Complaint::find($id);
        if ($complaint) {
            $complaint->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Complaint Deleted Successfully!'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Complaint Does Not Exist',
            ]);

        }
    }
}
