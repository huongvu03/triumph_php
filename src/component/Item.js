
import { useNavigate } from 'react-router-dom';
import '../css/item.css';

function Item({ item, addCart, getDetails }) {
    const navigate = useNavigate();
    return (
        <div className='item'>
            <div className='iteminfor' onClick={() => {
                getDetails(item); 
                navigate(`/details/${item.id}`)
            }}>
                <div className='irow1'>
                    <img className="rowimg" src={item.image} alt="pic" width="200px" height="400px" />
                </div>
                <div className='irow2'>
                    <div className='name'> {item.name}</div>
                    <div className='price'><p>{item.price}</p></div>
                    <div className='detail'>
                        <ul >
                            <li>{item.detail1}</li>
                            <li>{item.detail2}</li>
                        </ul>
                    </div>

                </div>
            </div>
            <div className='btn'>
                <div className='btnadd'  onClick={() => addCart(item)} >ADD TO CART</div>

                <div  className='btnview' onClick={() => {
                    getDetails(item);
                    navigate(`/details/${item.id}`) 
                }}>VIEW DETAILS</div>

            </div>

        </div>

    );
}
export default Item;