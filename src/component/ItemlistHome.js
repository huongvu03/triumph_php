import Item from "./Item"
import '../css/itemlisthome.css';
import ItemSearch from './ItemSearch';
import { useState } from "react";
import { useNavigate } from "react-router-dom";

function ItemlistHome({classic,adventures,addCart,getDetails}) {
    const navigate=useNavigate();
 
    return (
        <div className='product'>
            <div className="toppic" >
                <div className="backimg"><img src="27465_Street_Triple_RS_MY23_33148_ML_ORIGINAL.jpg" alt="pic" className='toppro' /></div>
                <h1>ACCESSORIZE YOUR RIDE</h1>
                <button onClick={()=>navigate(`/products`)}>VIEW ALL</button>
            </div>
            <div className='sort'>
                <h1>NEW ARRIVAL</h1>
            <button onClick={()=>navigate(`/products`)}>EXPLOSER HERE</button>
                {/* <div>
                    <button value='' onClick={() => sortNameAscen(items)} >Name ascending</button>
                    <button value='' onClick={() => sortNameDescen(items)}>Name descending</button>
                    <button value='' onClick={() => sortPriceAscen(items)}>Price ascending</button>
                    <button value='' onClick={() => sortPriceDescen(items)}>Price descending</button>
                </div> */}
                {/* <ItemSearch searchValue={seachValue} onSearch={handleSearch} /> */}
            </div>
            <div className='classic'>
                <div className='classicleft'>
                    <h3 className='title'>CLASSICS</h3>
                    <p>The legendary Bonneville bloodline itemsis built into our Modern Classics, with an unparalleled performance history, racing success and cultural impact.</p>
                </div>
                <div className='classicright'>
                    <ul >
                        {classic.map(c => (
                            <li>
                                <Item key={c.id} item={c} addCart={addCart} getDetails={getDetails} />
                            </li>
                        ))}
                    </ul>
                </div>
            </div>

          
            <div className='classic'>
                <div className='classicleft'>
                    <h3 className='title'>ADVENTURE</h3>
                    <p>Open up a world of adventure, with motorbikes built to go the distance, ready to go anywhere and take on anything.</p>
                </div>
                <div className='classicright'>
                    <ul>
                        {adventures.map(ad => (
                            <li>
                                <Item key={ad.id} item={ad} addCart={addCart} getDetails={getDetails} />
                            </li>
                        ))}
                    </ul>
                </div>
            </div> 

        </div>
    );

}
export default ItemlistHome;