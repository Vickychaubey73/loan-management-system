@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">

        <h2>BRE Rules</h2>

        <a href="{{ route('bre.create') }}" class="btn btn-success">
            + Add Rule
        </a>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Field</th>
                        <th>Operator</th>
                        <th>Value</th>
                        <th>Message</th>
                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($rules as $rule)

                    <tr>

                        <td>{{ $rule->id }}</td>

                        <td>{{ $rule->field }}</td>

                        <td>{{ $rule->operator }}</td>

                        <td>{{ $rule->value }}</td>

                        <td>{{ $rule->message }}</td>

                        <td>

                            <a href="{{ route('bre.edit',$rule->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <a href="{{ route('bre.delete',$rule->id) }}"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Delete this Rule?')">
                                Delete
                            </a>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6" class="text-center">
                            No Rules Found
                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection