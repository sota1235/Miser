/**
 * @fileoverview Combine reducers and export.
 */

import {combineReducers} from 'redux';
import calendar from 'reducers/calendar';

const reducers = combineReducers({calendar});

export default reducers;
