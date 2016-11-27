/**
 * @fileoverview Main file for app.
 */
import App from 'components/app-component';
import React from 'react';
import { render } from 'react-dom';
import { Provider } from 'react-redux';
import { createStore, applyMiddleware } from 'redux';
import reducers from 'reducers/index';
import middlewares from 'middlewares/index';

const store = createStore(reducers, applyMiddleware(...middlewares));

render(
  <Provider store={store}>
    <App />
  </Provider>,
  document.getElementById('main')
);
