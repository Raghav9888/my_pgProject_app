import React from 'react';
import TopContent from "./component/topContent";
import CrouselContent from "./component/crouselContent";
import LicenseContent from "./component/license";


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
            <LicenseContent/>
            <CrouselContent/>
        </React.Fragment>

    )
}