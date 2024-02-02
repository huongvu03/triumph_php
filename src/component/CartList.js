import CartItem from "./CartItem";
import '../css/cartlist.css';
function CartList ({cart,onDelete}) {
    return(
        <div className='cartList' >
           
            <h5>Your Cart</h5>
            <p>Price</p>
                        
             <hr/>
           
            <div className='cart'> {cart.map(c => (
             <CartItem key={c.id} item={c} onDelete={onDelete} />
                        ))}</div>
           
        </div>
    );
}
export default CartList;