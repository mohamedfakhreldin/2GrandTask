<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use function PHPSTORM_META\type;

class AdvertisementRequest extends FormRequest
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
            'type'=>'required|in:free,paid',
            'title'=>'required|string|max:160',
            'description'=>'required|string|min:30',
            'category'=>'required|exists:categories,id',
            'start_date'=>'required|date',
           'tags'=>'required|array',
            'tags.*'=>'required|exists:tags,tag_name',
            'advertiser'=>'required|exists:users,id'
        ];
    }
}
