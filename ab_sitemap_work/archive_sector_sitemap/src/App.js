import React, { Component } from 'react';
import './App.css';
import Tree from 'react-d3-tree';
import ArchiveSector from './sitemaps/archive_sector_map.js';

let data = ArchiveSector.site();

class NodeLabel extends React.PureComponent {
    render() {
        const {className, nodeData} = this.props;
        return (
            <div className={className}>
                <p>{nodeData.name}</p>
            </div>
        )
    }
}

class App extends Component {
  render() {
    return (
      <div style={{width: '5000px', height: '5000px'}}>
        <Tree
            data={data}
            orientation={'vertical'}
            initialDepth={1}
            allowForeignObjects
            nodeLabelComponent={{
                render: <NodeLabel/>
            }}
        />
      </div>
    );
  }
}

export default App;
