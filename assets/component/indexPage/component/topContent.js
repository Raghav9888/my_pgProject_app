import React from 'react';
import index2 from "../image/pg1.avif";
import index3 from "../image/pg2.avif";

export default function topContent() {
    return (
        <React.Fragment>
            <div className='row indexFirstRow'>
                <div className="col-md-6 textContainer animate__animated animate__fadeInRight animate__delay-1s">
                    <div className="container">
                        <p>
                            House rental website is a great way to find a rental property that meets your needs.
                            The website provides a searchable database of rental properties, as well as detailed
                            information
                            about each property.
                            You can also find rental properties by location, type, or price.
                            The website also provides a variety of features, such as detailed property descriptions,
                            photos,
                            and maps.
                        </p>
                    </div>
                </div>
                <div className="col-md-6 animate__animated animate__fadeInLeft  animate__delay-2s">
                    <img src={index2} className="img-fluid index2" alt={index2}/>
                </div>
                <div className="col-md-6 animate__animated animate__fadeInRight  animate__delay-4s">
                    <img src={index3} className="img-fluid index2" alt={index3}/>
                </div>
                <div className="col-md-6 textContainer animate__animated animate__fadeInLeft animate__delay-3s">
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
            </div>
        </React.Fragment>
    )
}