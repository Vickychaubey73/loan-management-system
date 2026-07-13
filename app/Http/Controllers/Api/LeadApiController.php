<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Services\CreditScoreService;
use App\Services\BreService;

class LeadApiController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required',
            'mobile' => 'required|unique:leads,mobile',
            'email' => 'required|email',
            'dob' => 'required',
            'city' => 'required',
            'pincode' => 'required',
            'loan_type' => 'required',
            'employment_type' => 'required',
            'monthly_income' => 'required|numeric',
            'loan_amount' => 'required|numeric',
            'property_value' => 'required|numeric',
        ]);

        $validated['consent'] = 1;

        $creditService = new CreditScoreService();
        $validated['credit_score'] = $creditService->getCreditScore($validated['mobile']);

        $breService = new BreService();
        $result = $breService->checkEligibility($validated);

        $validated['bre_status'] = $result['status'];
        $validated['rejection_reason'] = implode(', ', $result['reasons']);

        $lead = Lead::create($validated);

        return response()->json([
            'status' => 'success',
            'lead_id' => $lead->id,
            'credit_score' => $lead->credit_score,
            'bre_status' => $lead->bre_status,
            'rejection_reason' => $lead->rejection_reason
        ], 201);
    }
}