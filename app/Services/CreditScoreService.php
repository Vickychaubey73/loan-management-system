<?php

namespace App\Services;

class CreditScoreService
{
    public function getCreditScore($mobile)
    {
        // Mock Credit Score
        return rand(650, 850);
    }
}