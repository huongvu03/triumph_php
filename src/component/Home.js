import { Link, useNavigate } from 'react-router-dom';
import '../css/home.css';


function Home() {
    const navigate = useNavigate();
    return (
       <div className="section">
            <div>
                <video src='homevideo.mp4' controls autoPlay loop width={'100%'} height={"auto"} className='videohome'></video>
            </div>
            <h2>WELCOME TO TRIUMPH</h2>
            <h3>WHERE WOULD YOU LIKE TO START?</h3>
            <section >
                <container className='con1'>
                    <div className='conchild'>
                        <img src='img/slide_phutung.jpg' alt=""></img>
                        <h3>THE TRIUMPH OF YOUR DREAMS CLOSER THAN EVER</h3>
                        <Link to="/products"><h5>EXPLOSER HERE</h5></Link>
                    </div >
                    <div className='conchild' onClick={() => { navigate(`/products`) }}> 
           
                        <img src='21986_Tiger_1200_Rally_Pro_MY22_N4I2784_ML_ORIGINAL.jpg' alt=""></img>
                        <h3>OFFERING YOU THE PERFECT RIDE</h3><br />
                        <Link to="#"><h5>OFFERS AND FINANCE</h5></Link>
                    </div>
                    <div className='conchild'>
                        <img src='33213_MY24_SPEEDTWIN_1200_PB_352_ORIGINAL.jpg' alt=""></img>
                        <h3>PROVIDING TOTAL PEACE OF MIND</h3><br />
                        <Link to="#"><h5>TRIUMPH OWNERS</h5> </Link>
                    </div>
                </container>


            </section>
            </div>
      

    );
}
export default Home;