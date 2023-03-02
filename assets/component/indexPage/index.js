import App from "./indexPage.js";
import React, {useRef} from 'react';
import {createRoot} from "react-dom/client";

import './App.css';

const root = createRoot(document.getElementById('indexPage'));

root.render(
    <React.StrictMode>
        <App/>
    </React.StrictMode>
);