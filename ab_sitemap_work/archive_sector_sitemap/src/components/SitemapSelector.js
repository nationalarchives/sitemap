import React, { Component } from 'react';
import Tree from 'react-d3-tree';
import NodeLabel from '../components/NodeLabel.js';
import ArchiveSector from '../maps/ArchiveSector.js';
import InformationManagement from '../maps/InformationManagement.js';
import WebArchive from '../maps/WebArchive.js';

class SitemapSelector extends Component {
    constructor() {
        super();
        this.state = {
            site: ArchiveSector.site,
            depth: 1,
            orientation:'vertical'
        };
        this.handleChange = this.handleChange.bind(this);
    }

    handleChange(event) {
        let value;
        switch (event.target.value) {
            case "im":
                value = InformationManagement.site;
                break;
            case "wa":
                value = WebArchive.site;
                break;
            case "as":
            default:
                value = ArchiveSector.site;
                break;
        }
        this.setState({
            site: value,
            depth: 1,
            orientation:'vertical'
        });
    }

    render(){
        return <div>
                <form className={"SitemapForm"}>
                    <label>
                        Pick a view: <b/>
                        <select className={"SitemapSelect"} onChange={this.handleChange}>
                            <option value="as">Archive Sector</option>
                            <option value="im">Information Management</option>
                            <option value="wa">Web Archive</option>
                        </select>
                    </label>
                </form>
                <div style={{width: window.innerWidth, height: window.innerHeight}}>
                    <Tree
                        data={this.state.site}
                        orientation={this.state.orientation}
                        initialDepth={this.state.depth}
                        allowForeignObjects
                        nodeLabelComponent={{
                            render: <NodeLabel/>
                        }}
                    />
                </div>
            </div>;
    }
}

export default SitemapSelector