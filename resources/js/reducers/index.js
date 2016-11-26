/**
 * @fileoverview Combine reducers and export.
 */

import {combineReducers} from 'redux';
import calendar from 'reducers/calendar';
import currentCalendar from 'reducers/current';

const reducers = combineReducers({calendar, currentCalendar});

export default reducers;
