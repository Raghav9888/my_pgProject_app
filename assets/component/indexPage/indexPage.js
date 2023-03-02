import React, {useRef} from 'react';
import TopContent from "./component/topContent";
import CrouselContent from "./component/crouselContent";


function onclick() {
    $(document).ready(function () {

        var interval = window.setInterval(rotateSlides, 3000)

        function rotateSlides() {
            // animation will go here
        }

    })
}

export default function App() {

    return (
        <React.Fragment>
            <TopContent/>
            <CrouselContent/>
        </React.Fragment>

    )
}