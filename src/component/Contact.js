import '../css/contact.css';
function Contact() {
    return (
        <div>
            <div className='contact'>
                <img src="contactUs_1920x768.jpg" alt=""></img>
            </div>
            <div className='address'>
                <div>
                    <h3>ADDRESS AND GENERAL ENQUIRIES</h3>
                    <div>Triumph Motorcycles America
                        100 Hartsfield Centre Parkway, Suite 200
                        Atlanta, GA 30354</div>
                </div>
                <div>
                    <h3>CONTACTING CUSTOMER SERVICE</h3>
                    <div>Hours: Monday - Friday 8:30am to 8:00pm EST, Saturday 9:00am to 8:00pm EST</div>
                    <div>Email: tma.aftersales@triumphmotorcycles.com</div>
                </div>
            </div>
            <div className='table'>
                <h1>Contact Us</h1>
                <form action="" className='form'>
                    <ul>
                        <div className='label'>Name</div>
                        <div ><input type="text" className='input'></input></div>
                        <div className='label'>Phone</div>
                        <div><input type="text" className='input'></input></div>
                        <div className="label">Email Adress</div>
                        <div><input type="text" className='input'></input></div>
                        <div className="label">Comment</div>
                        <div ><textarea name id="content" cols="22" rows="10" className='input'></textarea></div>
                        <div></div>
                        <div >
                            <button type="submit" className='btn'>Send message</button>
                            <button type="reset" className='btn'>Reset</button>
                        </div>
                    </ul>
                </form>
            </div>
        </div>


    );
}
export default Contact;