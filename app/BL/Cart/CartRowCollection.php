<?php

    namespace App\BL\Cart;

    use Illuminate\Support\Collection;

    class CartRowCollection extends Collection {

        public function __get($arg)
        {
            if($this->has($arg))
            {
                return $this->get($arg);
            }

            return null;
        }

        public function discountedTotal()
        {
            if($this->discount > 0)
                return $this->subtotal - ( $this->discount * $this->qty );
            return $this->subtotal;
        }
    }