@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-success text-white">
            <h3>Add BRE Rule</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('bre.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label>Field</label>

                    <select name="field" class="form-control">
                        <option value="age">Age</option>
                        <option value="monthly_income">Monthly Income</option>
                        <option value="credit_score">Credit Score</option>
                        <option value="loan_percentage">Loan Percentage</option>
                    </select>

                </div>

                <div class="mb-3">
                    <label>Operator</label>

                    <select name="operator" class="form-control">
                        <option value=">=">>=</option>
                        <option value="<="><=</option>
                        <option value=">">></option>
                        <option value="<"><</option>
                        <option value="==">==</option>
                    </select>

                </div>

                <div class="mb-3">
                    <label>Value</label>
                    <input type="text" name="value" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Message</label>
                    <input type="text" name="message" class="form-control">
                </div>

                <button class="btn btn-success">
                    Save Rule
                </button>

                <a href="{{ route('bre.index') }}"
                   class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>

    </div>

</div>

@endsection