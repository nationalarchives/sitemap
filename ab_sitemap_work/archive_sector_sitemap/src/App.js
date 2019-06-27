import React, { Component } from 'react';
import './App.css';
import SitemapSelector from "./components/SitemapSelector";
import ArchiveSector from 'maps/ArchiveSector.js';
import InformationManagement from 'maps/InformationManagement.js';
import WebArchive from 'maps/WebArchive.js';
import About from "maps/About";
import Help from "maps/Help";
import Legal from "maps/Legal";
import RSS from "maps/RSS";
import HelpWithYourResearch from "maps/HelpWithYourResearch";


class App extends Component {
  render() {
    return (
        <div className={"App"}>
            <SitemapSelector />
        </div>

    );
  }
}

export default App;
