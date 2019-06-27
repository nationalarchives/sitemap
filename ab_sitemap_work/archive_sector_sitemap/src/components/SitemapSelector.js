import React, { Component } from 'react';
import Tree from 'react-d3-tree';
import NodeLabel from '../components/NodeLabel.js';

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
            case "infomanage":
                value = InformationManagement.site;
                break;
            case "webarc":
                value = WebArchive.site;
                break;
            case "about":
                value = About.site;
                break;
            case "help":
                value = Help.site;
                break;
            case "legal":
                value = Legal.site;
                break;
            case "rss":
                value = RSS.site;
                break;
            case "helpwith":
                value = HelpWithYourResearch.site;
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
                            <option value="arcsect">Archive Sector</option>
                            <option value="infomanage">Information Management</option>
                            <option value="webarc">Web Archive</option>
                            <option value="about">About</option>
                            <option value="help">Help</option>
                            <option value="legal">Legal</option>
                            <option value="rss">RSS</option>
                            <option value="helpwith">Help with your research</option>
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