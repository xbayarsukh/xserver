<?php

namespace App\Http\Requests;

use App\Models\ArrivalRecord;
use Illuminate\Support\Facades\Gate; // Add this line
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreArrivalRecordRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('arrival_record_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'recorded_at' => [
                'required',
                'date_format:' . config('app.date_format') . ' ' . config('app.time_format'),
            ],
        ];
    }
}
