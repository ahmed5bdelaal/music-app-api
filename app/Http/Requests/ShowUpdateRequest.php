<?php

namespace App\Http\Requests;


class ShowUpdateRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    
     public function authorize()
     {
         return true;
     }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'          => 'required|string',
            'description'   => 'required|string',
            'photo'         => 'nullable|image',
            'venue_id'      => 'required|integer',
            'show_id'       => 'required|integer'
        ];
    }
}
