import React, {useRef} from 'react';
import index1 from './image/index.jpg'
import index2 from './image/pg1.avif'
import index3 from './image/pg2.avif'
import Carousel from "./component/crousel";

function onclick()
{
    $(document).ready(function(){

        var interval = window.setInterval(rotateSlides, 3000)

        function rotateSlides() {
            // animation will go here
        }

    })
}
export default function App() {

    return (
        <React.Fragment>
            <div className='row' style={{backgroundColor: '#ffffff', padding: '0px', overflow: 'hidden'}}>
                <img src={index1} className="img-fluid animate__animated animate__fadeIn animate__faster" alt={index1}
                     style={{padding: '0px', height: '50rem',}}/>
                <div className="col-md-6 d-flex animate__animated animate__fadeInLeft animate__delay-2s"
                     style={{alignItems: 'center'}}>
                    <div className="container">
                        <h4>What is Lorem Ipsum?</h4>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type
                            specimen book. It has survived not only five centuries, but also the leap into
                            electronic typesetting, remaining essentially unchanged. It was popularised in
                            the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                            and more recently with desktop publishing software like Aldus PageMaker including
                            versions of Lorem Ipsum.
                        </p>
                    </div>
                </div>
                <div className="col-md-6 animate__animated animate__fadeInRight animate__delay-2s">
                    <img src={index2} className="img-fluid" alt={index2} style={{padding: '0px', overflow: 'hidden'}}/>
                </div>
                <div className="col-md-6 animate__animated animate__fadeInLeft animate__delay-3s">
                    <img src={index3} className="img-fluid" alt={index3}/>
                </div>
                <div className="col-md-6 d-flex animate__animated animate__fadeInRight animate__delay-3s " style={{alignItems: 'center'}}>
                    <div className="container" >
                        <h4>What is Lorem Ipsum?</h4>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type
                            specimen book. It has survived not only five centuries, but also the leap into
                            electronic typesetting, remaining essentially unchanged. It was popularised in
                            the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                            and more recently with desktop publishing software like Aldus PageMaker including
                            versions of Lorem Ipsum.
                        </p>
                    </div>
                </div>
            </div>
            <div className="row">
                <Carousel/>
            </div>
        </React.Fragment>

    )
}