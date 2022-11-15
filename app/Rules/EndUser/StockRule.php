<?php

namespace App\Rules\EndUser;

use App\Models\ProductDetail;
use Illuminate\Contracts\Validation\Rule;

class StockRule implements Rule
{
    private $product_details_id;
    private $stock;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($product_details_id)
    {
        $this->product_details_id = $product_details_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->stock = ProductDetail::findOrFail($this->product_details_id)->stock;
        return ($this->stock >= $value)?true:false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'There are only' . $this->stock . 'in the stock.';
    }
}
