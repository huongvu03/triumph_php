import '../css/about.css';
function About() {
    return (
        <div>
            <div>
                <video src='Celebrating 120 Years.mp4' controls autoPlay loop width="100%" height="auto" alt="" className='videohome' />
            </div>

            <div className='aboutcont'>

                <h3>BY RIDERS FOR RIDERS</h3>
                <div className='abcont'>
                    <p>

                        A motorcyclist's bike is not just a vehicle to be ridden, it is a conduit for thier attitude, ambition, and identity, while providing access to freedom, excitement, and comradery.

                        To riders everywhere a Triumph is always much more than the sum of its parts, encapsulating beauty, style and emotion, with a personality, that transcends a physical object – in simple terms, it has soul.

                        <br />  <br />  Across the generations, Triumph’s design and engineering teams produced some of the most characterful and successful motorcycles of all time, all created through a shared ethos for continuous, integrated development that encompasses every aspect of the ride.

                    </p>
                </div>
            </div>

            <div className='brand2'>

                <div >
                    <p className='brand2cont'>

                        In our unique development process Triumph’s engine, chassis, and styling teams work together to deliver the complete motorcycle, with continuous influence and input from customers and our expert dealers around the world on what riders want, value and need.

                    </p>
                </div>

                <div className='brand2img'>
                    <img src="../img/brand2-955x537.jpg" alt="" />
                </div>
            </div>

            <div className='videoabout'>
                <video src='Celebrating 120 Years of Passion _.mp4' controls loop width="100%" height="auto" alt="" />
            </div>

            <h3>GLOBAL LEGENDS</h3>
            <div className='abcont'>
                <p>

                    A truly global operation, Triumph has 13 sales and marketing offices around the world with manufacturing and production facilities in Thailand, where the company has its own casting, injection-molding, machining, and assembly facilities, as well as plants in India and Brazil, where bikes are assembled for local markets.

                    <br />  <br />  Every Triumph facility adheres to the same comprehensive processes of exacting standards examined at each stage of a motorcycle’s creation following exhaustive quality control process, with more than 400 review steps throughout the build encompassing every component.

                </p>
            </div>
            <div className='legend'>
                <img src="../img/brand.jpg" alt="" />
            </div>





        </div>
    );
}
export default About;