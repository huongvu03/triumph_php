import '../css/header.css';
import { Link} from 'react-router-dom';
import { useNavigate } from 'react-router-dom';
import 'bootstrap/dist/css/bootstrap.css';

function Header() {
   
        const deleteLocalStorage=()=>{
        localStorage.clear();
      }

    return (
        <div className='header'>
            <div className='headerimg' onClick={()=>Navigate('/')}><img src="logo (2).png" height={"50px"} alt={""}></img></div>

            <nav>
                <ul>
                    <Link to="/"><li>HOME</li></Link>
                    <Link to="/products"><li>PRODUCTS</li></Link>
                    <Link to="/about"><li>ABOUT US</li></Link>
                    <Link to="/contact"><li>CONTACT US</li></Link>
                    <Link to="/cart"><li><div className='bi bi-cart'>YOUR CART</div></li></Link>
                    {localStorage.getItem('username') ?
                        (<span>
                            Hello{localStorage.getItem('username')},

                            <Link to="/login" style={{ fontSize: '15px' }} onClick={() => deleteLocalStorage() } >Log Out</Link>
                        </span>) :
                        (<Link to="/login" style={{ fontSize: '15px' }}><li>Log in</li></Link>)
                    }
                    
                                       
                    {/* <Link to="#"><li style={{ fontSize: '15px' }}>Hotline 090 678 8888</li></Link> */}


                </ul>
            </nav>

        </div>
    );
}
export default Header;
