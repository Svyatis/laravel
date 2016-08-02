<?php
/**
 * Created by PhpStorm.
 * User: svyatis
 * Date: 21.07.16
 * Time: 1:11
 */

namespace App\Http\Requests;


class UploadRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|max:15',
            'description'   => 'required|max:300',
            'image'         => 'required|mimes:png,jpeg,jpg,bmp|max:10000',
        ];
    }
}