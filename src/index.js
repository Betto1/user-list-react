import React from 'react';
import ReactDOM from 'react-dom';
import App from './App';

window.React = React;

document.addEventListener( 'DOMContentLoaded', function() {
    var element = document.getElementById('app');
    if ( typeof element !== 'undefined' && element !== null) {
        ReactDOM.render( <App />, document.getElementById('app'))
    }
} );
