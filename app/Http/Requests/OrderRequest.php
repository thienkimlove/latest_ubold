<?php

namespace App\Http\Requests;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng không để trống tên',
            'product_id.required' => 'Vui lòng chọn sản phẩm',
            'quantity.required' => 'Vui lòng chọn số lượng',
        ];
    }

    public function store()
    {
        $data = $this->all();
        if (! isset($this->status)) {
            $data['status'] = 0;
        }
        Order::create($data);

        return $this;
    }

    public function save($id)
    {
        $order = Order::findOrFail($id);

        $data = $this->all();
        if (! isset($this->status)) {
            $data['status'] = 0;
        }
        $order->update($data);

        return $this;
    }
}
