/**
 * @fileoverview Reducer for changing calendar state.
 */
import {UPDATE_CALENDAR} from 'actions/action-types';

/**
 * @description Change state of the data of the day.
 * @param {Object} state
 * @param {Object} action
 * @return {Object} state
 */
const day = (state, action) => ({
  day       : action.day,
  isCurrent : action.isCurrent,
  timestamp : action.timestamp,
});

/**
 * @description Make state of calendar.
 * @param {array} state
 * @param {Object} action
 * @return {array}
 */
const calendar = (state = [], action) => {
  switch (action.type) {
    case UPDATE_CALENDAR:
      return action.calendar;
    default:
      return state;
  }
};

export default calendar;
