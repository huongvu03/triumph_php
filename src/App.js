import { useState, useEffect } from "react";
import { useNavigate, Navigate, Link, Routes, Route } from "react-router-dom";
import './css/header.css';
import 'bootstrap/dist/css/bootstrap.css'
import Home from "./component/Home";
import About from './component/About';
import Contact from './component/Contact';
import Footer from './component/Footer';
import ItemList from "./component/ItemList";
import CartList from "./component/CartList";
import ItemDetail from "./component/ItemDetail";
// import ItemSearch from "./component/ItemSearch";
import Login from "./component/Login";
import ItemlistHome from "./component/ItemlistHome";


function App() {
  const [products, setProducts] = useState([]);
  const [filterProduct, setFilterProduct] = useState([]);
  const [users, setUsers] = useState([]);

   const [classic,setClassic]=useState([]);
   const [adventures,setAdventures]=useState([]);

  useEffect(() => {
    const fetchData = async () => {
      try {
        //đọc file json thứ nhất
        const productJson = await fetch('products.json');
        const productData = await productJson.json();
        setProducts(productData);
        setFilterProduct(productData);
        console.log(productData);

        const productData1=productData;
        const productData2=productData;

        setClassic(productData1.filter(p=>p.brand==="classic").slice(0,2));
        setAdventures(productData2.filter(p=>p.brand==="adventures").slice(0,2));


        //đọc file json thứ hai
        const userJson = await fetch('user.json');
        const userData = await userJson.json();
        setUsers(userData);
        console.log(userData);
      } catch (error) {
        console.log('error reading json');
      }
    };
    fetchData();
  }, []);

  //add cart
  const [carts, setCarts] = useState([]);
  const handleCart = (newItem) => {
    setCarts([...carts, newItem]);
  }
  //delete Cart
  const hanldeDeleteCart = (id) => {
    const deleteCart = carts.filter(c => c.id !== id);
    setCarts(deleteCart);
  }
  // detail
  const [detail, setDetails] = useState(null);
  const GetDetails = (pro) => {
    setDetails(pro);
  }

  //search name
  const [seachValue, setSearchValue] = useState([]);
  const handleSearch = (value) => {
    setSearchValue(value);
    const dataSearch = products.filter
      // ???? products hay filter ?
      (pro => pro.name.toLowerCase().includes(value.toLowerCase()));
    setFilterProduct(dataSearch);
  }

  //sort by name tang-giam
  const sortNameAscen = () => {
    const sortedProduct = [...filterProduct].sort((a, b) =>
      a.name.localeCompare(b.name));//a,b tang dan
    setFilterProduct(sortedProduct);
  }
  const sortNameDescen = () => {
    const sortedProduct = [...filterProduct].sort((b, a) =>
      a.name.localeCompare(b.name));//a,b giam dan
    setFilterProduct(sortedProduct);
  }
  //sort by price tang-giam
  const sortPriceAscen = () => {
    const sortedProduct = [...filterProduct].sort((a, b) =>
      a.name.localeCompare(b.name));//a,b tang dan
    setFilterProduct(sortedProduct);
  }
  const sortPriceDescen = () => {
    const sortedProduct = [...filterProduct].sort((b, a) =>
      a.name.localeCompare(b.name));//a,b giam dan
    setFilterProduct(sortedProduct);
  }

  //chua loi
  const [errorlogin, setErrorlogin] = useState('');
  //check login
  const navigate = useNavigate();//dieu huong 
  const checkLogin = (checkUser) => {
    const findUser = users.find(u =>
      u.username == checkUser.username && u.pass == checkUser.pass);
    if (findUser != null) {
      console.log("log in thanh cong");
      localStorage.setItem('username', findUser.username);
      navigate('/cart');
      setErrorlogin('');
    } else {
      console.log("log in  ko thanh cong");
      setErrorlogin('invalid username/pass');
    }
  }
  const deleteLocalStorage = () => {
    localStorage.clear();
  }


  return (
    <div>
      <div className='header'>
      <Link to="/"> <div className='headerimg' ><img src="logo (2).png" height={"50px"} alt={""}></img></div></Link>
        <nav>
          <ul>
            <Link to="/"><li>HOME</li></Link>
            <Link to="/productshome"><li>PRODUCTS</li></Link>
            <Link to="/about"><li>ABOUT US</li></Link>
            <Link to="/contact"><li>CONTACT US</li></Link>
            <Link to="/cart"><li>YOUR CART</li></Link>
            {localStorage.getItem('username') ?
              (<span style={{ color: 'white' }}>
                Hello {localStorage.getItem('username')},
                <Link to="/login" style={{ fontSize: '15px' }} onClick={() => deleteLocalStorage()} >Log Out</Link>
              </span>) :
              (<Link to="/login" style={{ fontSize: '15px' }}><li>Log in</li></Link>)
            }
          </ul>
        </nav>
      </div>

      <Routes>
        <Route path='/' element={<Home />} />
        <Route path='/about' element={<About />} />
        <Route path='/contact' element={<Contact />} />
        <Route path='/productshome' element={<ItemlistHome classic={classic} adventures={adventures} addCart={handleCart} getDetails={GetDetails} />} />
        <Route path='/products' element={
          <div>
            {/* < Pricesearched onPriceSearch ={PriceSearch} /> */}
            <ItemList items={filterProduct} addCart={handleCart} getDetails={GetDetails}
              sortNameAscen={sortNameAscen}
              sortNameDescen={sortNameDescen}
              sortPriceAscen={sortPriceAscen}
              sortPriceDescen={sortPriceDescen}
              searchValue={seachValue} handleSearch={handleSearch}
            />
          </div>
        } />

        <Route path='/cart' element={
          localStorage.getItem('username') ? (
            <CartList cart={carts} onDelete={hanldeDeleteCart} />
          ) : (<Navigate to='/login' />)
        } />
        {/* <Route path='/create' element={<Create onAdd={onAdd}/>} /> */}
        <Route path='/login' element={<Login checkLogin={checkLogin} errorLogin={errorlogin} />} />
        <Route path='/details/:id' element={<ItemDetail addCart={handleCart} />} />
      </Routes>
      <Footer />
    </div>
  );
}

export default App;
