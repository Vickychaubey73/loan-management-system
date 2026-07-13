<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Services\CreditScoreService;
use App\Services\BreService;

class LeadController extends Controller
{
    public function create()
    {
        return view('loan.application');
    }

    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'full_name'       => 'required|string|max:255',
            'mobile'          => 'required|string|max:10|unique:leads,mobile',
            'email'           => 'required|email',
            'dob'             => 'required|date',
            'city'            => 'required',
            'pincode'         => 'required|digits:6',
            'loan_type'       => 'required',
            'employment_type' => 'required',
            'monthly_income'  => 'required|numeric|min:1',
            'loan_amount'     => 'required|numeric|min:1',
            'property_value'  => 'required|numeric|min:1',
            'consent'         => 'required',
        ]);

        // Consent
        $validated['consent'] = 1;

        // Credit Score
        $creditService = new CreditScoreService();
        $validated['credit_score'] = $creditService->getCreditScore($validated['mobile']);

        // BRE
        $breService = new BreService();
        $result = $breService->checkEligibility($validated);

        // BRE Result
        $validated['bre_status'] = $result['status'];
        $validated['rejection_reason'] = implode(', ', $result['reasons']);

        // Save Lead
        Lead::create($validated);

        return redirect()
            ->route('loan.form')
            ->with([
                'success' => 'Loan Application Submitted Successfully.',
                'status' => $result['status'],
                'credit_score' => $validated['credit_score'],
                'reasons' => $result['reasons'],
            ]);
    }
}