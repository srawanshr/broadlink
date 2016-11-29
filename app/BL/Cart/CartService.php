<?php namespace App\BL\Cart;

use Exception;
use Illuminate\Session\SessionManager;

class CartService
{
    protected $session;
    protected $instance;

    public function __construct ( SessionManager $session )
    {
        $this->session = $session;

        $this->instance = 'main';
    }

    public function instance($instance = null)
    {
        if(empty($instance)) throw new Exception('ShoppingcartInstanceException');

        $this->instance = $instance;

        // Return self so the method is chainable
        return $this;
    }

    /**
     * @param null $name
     * @param null $qty
     * @param null $discount
     * @param null $price
     * @param array $options
     * @return bool
     */
    public function add ( $name, $qty = null, $discount = null, $price = null, array $options = [] )
    {
        if ( is_array ( $name ) ) {
            if($this->is_multi($name)) {
                foreach ($name as $item) {
                    $this->add ( $item[ 'name' ], $item[ 'qty' ], $item[ 'discount' ], $item[ 'price' ], $item[ 'options' ] );
                }
            }

            $result = $this->addRow($name[ 'name' ], $name[ 'qty' ], $name[ 'discount' ], $name[ 'price' ], $name[ 'options' ]);

            return $result;
        }

        $results = $this->addRow ( $name, $qty, $discount, $price, $options );

        return $results;
    }

    /**
     * @param $name
     * @param $qty
     * @param $discount
     * @param $price
     * @param array $options
     * @throws Exception
     */
    private function addRow ( $name, $qty, $discount, $price, array $options = [] )
    {
        if ( empty($name) || empty($qty) || !isset($price) ) {
            throw new Exception( 'CartInvalidItemException' );
        }

        if ( !is_numeric ( $qty ) || $qty < 0 ) {
            throw new Exception( 'CartInvalidQtyException' );
        }

        if ( !is_numeric ( $price ) || $price < 0 ) {
            throw new Exception( 'CartInvalidPriceException' );
        }

        if ( !is_numeric ( $discount ) || $discount < 0 ) {
            throw new Exception( 'CartInvalidDiscountException' );
        }

        $cart = $this->getContent ();

        $rowId = $this->generateRowId ( $options );

        if ( $cart->has ( $rowId ) ) {
            $row = $cart->get ( $rowId );
            $cart = $this->updateRow ( $rowId, ['qty' => $row->qty + $qty] );
        } else {
            $cart = $this->createRow ( $rowId, $name, $qty, $discount, $price, $options );
        }

        return $this->updateCart ( $cart );
    }

    public function update($rowId, $attribute)
    {
        if( ! $this->hasRowId($rowId)) throw new Exception('CartInvalidRowIDException');

        if(is_array($attribute))
        {
            $result = $this->updateAttribute($rowId, $attribute);

            return $result;
        }

        $result = $this->updateQty($rowId, $attribute);

        return $result;
    }

    protected function updateAttribute($rowId, $attributes)
    {
        return $this->updateRow($rowId, $attributes);
    }

    protected function updateQty($rowId, $qty)
    {
        if($qty <= 0)
        {
            return $this->remove($rowId);
        }

        return $this->updateRow($rowId, ['qty' => $qty]);
    }

    private function getContent ()
    {
        $content = ($this->session->has ( $this->getInstance () )) ? $this->session->get ( $this->getInstance () ) : new CartCollection;

        return $content;
    }

    protected function getInstance ()
    {
        return 'cart.' . $this->instance;
    }

    private function generateRowId ( $options )
    {
        ksort ( $options );
        $seed = time() .serialize ( $options );

        return md5 ( $seed );
    }

    private function updateRow ( $rowId, $attributes )
    {
        $cart = $this->getContent ();

        $row = $cart->get ( $rowId );

        foreach ($attributes as $key => $value) {
            if ( $key == 'options' ) {
                $options = $row->options->merge ( $value );
                $row->put ( $key, $options );
            } else {
                $row->put ( $key, $value );
            }
        }

        if ( !is_null ( array_keys ( $attributes, ['qty', 'price'] ) ) ) {
            $row->put ( 'subtotal', $row->qty * $row->price );
        }

        $cart->put ( $rowId, $row );

        return $cart;
    }

    private function createRow ( $rowId, $name, $qty, $discount, $price, $options )
    {
        $cart = $this->getContent ();

        $newRow = new CartRowCollection( [
            'rowid'    => $rowId,
            'name'     => $name,
            'qty'      => $qty,
            'discount' => $discount,
            'price'    => $price,
            'options'  => new CartOptionCollection( $options ),
            'subtotal' => $qty * $price
        ] );

        $cart->put ( $rowId, $newRow );

        return $cart;
    }

    private function updateCart ( $cart )
    {
        return $this->session->put ( $this->getInstance (), $cart );
    }

    public function content ()
    {
        $cart = $this->getContent ();

        return (empty($cart)) ? NULL : $cart;
    }

    public function get($rowId)
    {
        $cart = $this->getContent();

        return ($cart->has($rowId)) ? $cart->get($rowId) : NULL;
    }

    public function count($totalItems = true)
    {
        $cart = $this->getContent();

        if( ! $totalItems)
        {
            return $cart->count();
        }

        $count = 0;

        foreach($cart AS $row)
        {
            $count += $row->qty;
        }

        return $count;
    }

    public function total()
    {
        $total = 0;
        $cart = $this->getContent();

        if(empty($cart))
        {
            return $total;
        }

        foreach($cart AS $row)
        {
            $total += $row->subtotal;
        }

        return $total;
    }

    protected function hasRowId($rowId)
    {
        return $this->getContent()->has($rowId);
    }

    public function remove($rowId)
    {
        if( ! $this->hasRowId($rowId)) throw new Exception('CartInvalidRowIDException');

        $cart = $this->getContent();

        $cart->forget($rowId);

        return $this->updateCart($cart);
    }

    public function destroy()
    {
        $result = $this->updateCart(NULL);

        return $result;
    }

    protected function is_multi(array $array)
    {
        return is_array(head($array));
    }

    public function discountedTotal()
    {
        $total = 0;

        foreach ( $this->getContent() as $item)
        {
            $total += $item->discountedTotal();
        }

        return $total;
    }
    
    public function vatTotal($vat)
    {
        return $vat * $this->discountedTotal();
    }
}