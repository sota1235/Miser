/**
 * @fileoverview Reducer for changing calendar state.
 */
import { UPDATE_CALENDAR } from 'actions/action-types';

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
