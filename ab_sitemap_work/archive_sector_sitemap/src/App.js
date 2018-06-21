import React, { Component } from 'react';
import './App.css';
import SitemapSelector from "./components/SitemapSelector";


// function SiteTree (props) {
//     render()
//
// }


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
