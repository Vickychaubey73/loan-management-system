@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-warning">
            <h3>Edit BRE Rule</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('bre.update',$rule->id) }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label>Field</label>

                    <select name="field" class="form-control">

                        <option value="age"
                            {{ $rule->field=='age'?'selected':'' }}>
                            Age
                        </option>

                        <option value="monthly_income"
                            {{ $rule->field=='monthly_income'?'selected':'' }}>
                            Monthly Income
                        </option>

                        <option value="credit_score"
                            {{ $rule->field=='credit_score'?'selected':'' }}>
                            Credit Score
                        </option>

                        <option value="loan_percentage"
                            {{ $rule->field=='loan_percentage'?'selected':'' }}>
                            Loan Percentage
                        </option>

                    </select>

                </div>

                <div class="mb-3">

                    <label>Operator</label>

                    <input type="text"
                           name="operator"
                           value="{{ $rule->operator }}"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label>Value</label>

                    <input type="text"
                           name="value"
                           value="{{ $rule->value }}"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label>Message</label>

                    <input type="text"
                           name="message"
                           value="{{ $rule->message }}"
                           class="form-control">

                </div>

                <button class="btn btn-success">
                    Update Rule
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