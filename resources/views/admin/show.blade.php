@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">

        <h2>Lead Details</h2>

        <a href="{{ route('admin.leads') }}" class="btn btn-primary">
            Back to Leads
        </a>

    </div>

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h4>{{ $lead->full_name }}</h4>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <strong>Mobile :</strong>
                    {{ $lead->mobile }}
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Email :</strong>
                    {{ $lead->email }}
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Date of Birth :</strong>
                    {{ $lead->dob }}
                </div>

                <div class="col-md-6 mb-3">
                    <strong>City :</strong>
                    {{ $lead->city }}
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Pincode :</strong>
                    {{ $lead->pincode }}
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Loan Type :</strong>
                    {{ $lead->loan_type }}
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Employment :</strong>
                    {{ $lead->employment_type }}
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Monthly Income :</strong>
                    ₹{{ number_format($lead->monthly_income) }}
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Loan Amount :</strong>
                    ₹{{ number_format($lead->loan_amount) }}
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Property Value :</strong>
                    ₹{{ number_format($lead->property_value) }}
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Credit Score :</strong>
                    {{ $lead->credit_score }}
                </div>

                <div class="col-md-6 mb-3">
                    <strong>BRE Status :</strong>

                    @if($lead->bre_status == 'Eligible')
                        <span class="badge bg-success">Eligible</span>
                    @else
                        <span class="badge bg-danger">Not Eligible</span>
                    @endif

                </div>

                <div class="col-md-12">

                    <strong>Rejection Reason :</strong>

                    @if($lead->rejection_reason)
                        {{ $lead->rejection_reason }}
                    @else
                        <span class="text-success">No Rejection Reason</span>
                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@endsection