<?php

namespace App\Traits\sms;
use Exception;
use Illuminate\Support\Facades\Http;

trait sendSMS
{
    public function afterSubmission($phone)
    {
        $message = 'Submit successfully';

        try {
            $apiLink = (env('APP_ENV') =='local') ? env('MOCK_API_SMS_LOCAL') : env('MOCK_API_SMS_PROD');
            $response = Http::post($apiLink , [
                'to' => $phone,
                'message' => $message,
            ]);
    
            return $response->successful();
        } catch (Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}