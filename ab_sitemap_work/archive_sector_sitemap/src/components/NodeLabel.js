import React from 'react';

class NodeLabel extends React.PureComponent {
    static formatName(name) {
        let i = 0, length = name.length;
        for (i; i < length; i++) {
            name = name.replace("-", " ")
        }
        return name.charAt(0).toUpperCase() + name.substr(1);
    }

    render() {
        const {nodeData} = this.props;
        return (
            <div className={"TreeNode"}>
                <p>{NodeLabel.formatName(nodeData.name)}</p>
                <p>{nodeData.param}</p>
            </div>
        )
    }
}

export default NodeLabel