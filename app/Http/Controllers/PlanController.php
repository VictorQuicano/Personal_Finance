<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanStoreRequest;
use App\Http\Requests\PlanUpdateRequest;
use App\Models\Plan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PlanController extends Controller
{
    public function index(Request $request): Response
    {
        $plans = Plan::all();

        return view('plan.index', [
            'plans' => $plans,
        ]);
    }

    public function create(Request $request): Response
    {
        return view('plan.create');
    }

    public function store(PlanStoreRequest $request): Response
    {
        $plan = Plan::create($request->validated());

        $request->session()->flash('plan.id', $plan->id);

        return redirect()->route('plans.index');
    }

    public function show(Request $request, Plan $plan): Response
    {
        return view('plan.show', [
            'plan' => $plan,
        ]);
    }

    public function edit(Request $request, Plan $plan): Response
    {
        return view('plan.edit', [
            'plan' => $plan,
        ]);
    }

    public function update(PlanUpdateRequest $request, Plan $plan): Response
    {
        $plan->update($request->validated());

        $request->session()->flash('plan.id', $plan->id);

        return redirect()->route('plans.index');
    }

    public function destroy(Request $request, Plan $plan): Response
    {
        $plan->delete();

        return redirect()->route('plans.index');
    }
}
