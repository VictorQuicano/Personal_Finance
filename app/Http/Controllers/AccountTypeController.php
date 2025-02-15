<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountTypeStoreRequest;
use App\Http\Requests\AccountTypeUpdateRequest;
use App\Models\AccountType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AccountTypeController extends Controller
{
    public function index(Request $request): Response
    {
        $accountTypes = AccountType::all();

        return view('accountType.index', [
            'accountTypes' => $accountTypes,
        ]);
    }

    public function create(Request $request): Response
    {
        return view('accountType.create');
    }

    public function store(AccountTypeStoreRequest $request): Response
    {
        $accountType = AccountType::create($request->validated());

        $request->session()->flash('accountType.id', $accountType->id);

        return redirect()->route('accountTypes.index');
    }

    public function show(Request $request, AccountType $accountType): Response
    {
        return view('accountType.show', [
            'accountType' => $accountType,
        ]);
    }

    public function edit(Request $request, AccountType $accountType): Response
    {
        return view('accountType.edit', [
            'accountType' => $accountType,
        ]);
    }

    public function update(AccountTypeUpdateRequest $request, AccountType $accountType): Response
    {
        $accountType->update($request->validated());

        $request->session()->flash('accountType.id', $accountType->id);

        return redirect()->route('accountTypes.index');
    }

    public function destroy(Request $request, AccountType $accountType): Response
    {
        $accountType->delete();

        return redirect()->route('accountTypes.index');
    }
}
