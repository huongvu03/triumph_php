import '../css/footer.css';
import { Link } from 'react-router-dom';
function Footer() {
    return (

        <footer>
            <hr></hr>
            <div className='foot'>
                <nav className='footnav'>
                    <ul>
                        <Link to="/"><li>Home</li></Link>
                        <Link to="/products"><li>Products</li></Link>
                        <Link to="/about"><li>About Us</li></Link>
                        <Link to="/contact"><li>Contact</li></Link>
                        <Link to="#" className='hotline'><li>Hotline 090 678 8888</li></Link>

                    </ul>
                </nav>
            

            <div >
                {/* <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15677.537018544102!2d106.67389019490678!3d10.781853508892759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fcdf5e6b00b%3A0xed1c6762515e1113!2sFPT%20Aptech%20-%20Game%20Development%20with%20Unity!5e0!3m2!1sen!2s!4v1697343417078!5m2!1sen!2s"
                 width="800" height="600" style="border:0 " allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="image2"></iframe> */}
            </div>

            <div><p>@copyright by Team3</p></div>
            </div>
        </footer>
    );
}
export default Footer;