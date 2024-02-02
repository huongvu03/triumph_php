import { useState } from "react";
function PriceSearch({onPriceSearch}) {
    const[from,setFrom]=useState('');
    const[to,setTo]=useState('');

    const handleSubmit=(e) =>{
        e.preventDefault();
        const checkPrice={from,to};
        onPriceSearch(checkPrice);
        setFrom('');
        setTo('');
    }
    return (
        <div>
            <form onSubmit={handleSubmit}>
            
                <tr>
                    <td>
                        <input type="number" placeholder="Search By Min Price "
                            value={from}//gia tri can search
                            onChange={(e) => setFrom(e.target.value)}
                        /></td>
                    <td>
                        <input type="number" placeholder="Search By Max Price"
                            value={to}//gia tri can search/>
                            onChange={(e) => setTo(e.target.value)}
                        />
                    </td>
                    <td>
                    <button  type="submit">Serach by Price</button>

                    </td>


                </tr>
            </form>
        </div>
    );
}
export default PriceSearch;