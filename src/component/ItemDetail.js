import '../css/detail.css';
import { useState, useEffect } from "react";
import { useParams } from "react-router-dom";

function ItemDetail({ addCart }) {
    const { id } = useParams();
    const [item, setItems] = useState(null);
    useEffect(() => {
        const fetchData = async () => {
            try {
                const dataJson = await fetch('../products.json');
                const data = await dataJson.json();
                //lay book dua vao id
                const selecteditem = data.find((pro) => pro.id == id);
                setItems(selecteditem);

                console.log(item);
            } catch (error) {
                console.log('error reading json');
            }
        };
        fetchData();
    }, []);

    console.log(item);

    if (!item) {
        return <h1>loading...</h1>
    }
    return (
        <div className="productDetails">
            <>
                <div className='dleft'>
                    <div className='dname'> {item.name}</div>
                    <div className='dprice'> <p>{item.price}</p></div>
                    <button onClick={() => addCart(item)} className='dbtn'>  ADD TO CART</button>
                </div>
                <div className='dpic'><img src={item.image} alt="pic" /></div>
            </>
            <div className='ddetail'>
                <ul>
                    <li>{item.detail1}</li>
                    <li>{item.detail2}</li>
                    <li>{item.detail3}</li>
                    <li>{item.detail4}</li>
                </ul>
            </div>

        </div>
    );
}
export default ItemDetail;