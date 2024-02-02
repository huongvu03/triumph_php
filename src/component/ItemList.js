import Item from "./Item"
import '../css/itemlist.css';
import ItemSearch from './ItemSearch';

function ItemList({ items, addCart, getDetails, sortNameAscen, sortNameDescen, sortPriceAscen, sortPriceDescen, seachValue, handleSearch }) {
    return (
        <div className='productlist'>
            <div className="toppic" >
                <img src="27465_Street_Triple_RS_MY23_33148_ML_ORIGINAL.jpg" alt="pic" className='toppro' />
                <h1>ACCESSORIZE YOUR RIDE</h1>
            </div>
            <div className='sortlist'>
                <div style={{fontSize:"20px"}}>Sort by</div>
                <div>
                    <button value='' onClick={() => sortNameAscen(items)} >Name ascending</button>
                    <button value='' onClick={() => sortNameDescen(items)}>Name descending</button>
                    <button value='' onClick={() => sortPriceAscen(items)}>Price ascending</button>
                    <button value='' onClick={() => sortPriceDescen(items)}>Price descending</button>
                </div>
                <ItemSearch searchValue={seachValue} onSearch={handleSearch} />
            </div>
            <div className='classiclist'>
                {/* <div className='classicleft'>
                    <h3 className='title'>CLASSICS</h3>
                    <p>The legendary Bonneville bloodline itemsis built into our Modern Classics, with an unparalleled performance history, racing success and cultural impact.</p>
                </div> */}
                <div className='classicrightlist'>
                    <ul >
                        {items.map(c => (
                            <li>
                                <Item key={c.id} item={c} addCart={addCart} getDetails={getDetails} />
                            </li>
                        ))}
                    </ul>
                </div>
            </div>

        </div>
    );

}
export default ItemList;