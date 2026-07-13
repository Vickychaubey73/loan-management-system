<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BreRule;

class BreRuleController extends Controller
{
    public function index()
    {
        $rules = BreRule::latest()->get();

        return view('admin.bre.index', compact('rules'));
    }

    public function create()
    {
        return view('admin.bre.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'field' => 'required',
            'operator' => 'required',
            'value' => 'required',
            'message' => 'required'
        ]);

        BreRule::create($request->all());

        return redirect()->route('bre.index')
            ->with('success', 'Rule Added Successfully');
    }

    public function edit($id)
    {
        $rule = BreRule::findOrFail($id);

        return view('admin.bre.edit', compact('rule'));
    }

    public function update(Request $request, $id)
    {
        $rule = BreRule::findOrFail($id);

        $rule->update($request->all());

        return redirect()->route('bre.index')
            ->with('success', 'Rule Updated Successfully');
    }

    public function delete($id)
    {
        BreRule::findOrFail($id)->delete();

        return redirect()->route('bre.index')
            ->with('success', 'Rule Deleted Successfully');
    }
}