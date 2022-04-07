import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router } from 'react-router-dom';
import App from './App.jsx';
import './normalize.css'
import store from './reducer/index';
import { Provider } from 'react-redux';


ReactDOM.render(
  <React.StrictMode>
    <Router>
      <Provider store={store}>
        <App />
        </Provider>
    </Router>
  </React.StrictMode>,
  document.getElementById('root')
);
