<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();

            $table->string('full_name');
            $table->string('mobile')->unique();
            $table->string('email');
            $table->date('dob');
            $table->string('city');
            $table->string('pincode');

            $table->enum('loan_type', ['Home Loan', 'Loan Against Property']);
            $table->enum('employment_type', ['Salaried', 'Self Employed']);

            $table->decimal('monthly_income', 12, 2);
            $table->decimal('loan_amount', 12, 2);
            $table->decimal('property_value', 12, 2);

            $table->boolean('consent');

            $table->integer('credit_score')->nullable();
            $table->string('bre_status')->nullable();
            $table->text('rejection_reason')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};