import React, {Component} from 'react';
import {Route, Switch,Redirect, Link, withRouter} from 'react-router-dom';
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";

class Home extends Component {
    render() {
        return (
            <div>
                <FontAwesomeIcon icon="check-square" />
                Popular gadgets come from vendors like:
                <FontAwesomeIcon icon={['fab', 'apple']} />
                <FontAwesomeIcon icon={['fab', 'microsoft']} />
                <FontAwesomeIcon icon={['fab', 'google']} />
            </div>
        )
    }
}

export default Home;