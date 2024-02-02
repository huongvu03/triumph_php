import '../css/cartlist.css';
function CartItem({ item, onDelete }) {
    return (
        <div className='cartitem'>
            <div className='cpic'><img src={item.image} alt="pic" /></div>
            <div className='ccolum2'>
                <div className='cname' >{item.name}</div>
                <div><button  className='cbtn' type="submit" onClick={() => { onDelete(item.id) }}>Remove</button></div>
            </div >
            <div className='cquantity' >quantity</div>
            <div className='cprice' >{item.price}</div>
        </div>
    );
}
export default CartItem;