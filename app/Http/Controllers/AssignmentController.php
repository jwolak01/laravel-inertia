<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Http\Requests\StoreAssignmentRequest;
use App\Http\Requests\UpdateAssignmentRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use PhpParser\Node\Expr\Assign;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $assignments = Assignment::all();
        $inProgressAssignments = Assignment::inProgressAssignments()->get();
        $inProgressAssignments->map(function ($item, $key) {
            return $item->sinceUpdate = $item->updated_at->diffForHumans(Carbon::now());
        });

        $completeAssignments = Assignment::completeAssignments()->get();
        $completeAssignments->map(function ($item, $key) {
            return $item->sinceUpdate = $item->updated_at->diffForHumans(Carbon::now());
        });

        return Inertia::render('Assignments/Assignments', [
            'assignments' => $assignments,
            'inProgressAssignments' => $inProgressAssignments,
            'completeAssignments' => $completeAssignments,
        ]);
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
     * @param  \App\Http\Requests\StoreAssignmentRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreAssignmentRequest $request)
    {
        //$assignment = Assignment::create($request->all());

        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
        ])->validateWithBag('addAssignment');

        Assignment::create([
            'name' => $request->name,
            'complete' => $request->complete,
        ]);

        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : back()->with('status', 'assignment-created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAssignmentRequest  $request
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAssignmentRequest $request, Assignment $assignment)
    {
        $assignment->forceFill([
           'complete' => $request->complete,
        ])->save();

        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : back()->with('status', 'assignment-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        //
    }
}
