<?php

namespace App\Http\Requests;


class ShowRequest extends ApiRequest
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
            'photo'         => 'required|image|nullable',
            'venue_id'      => 'required|integer',
            'artist_id'     => 'required',
            'artist_id.*'   => 'integer',
        ];
    }
}
