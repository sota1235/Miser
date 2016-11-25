/**
 * @fileoverview Reducer for changing calendar state.
 */
import {uniqueId} from 'lodash';
import * as ActionNames from 'actions/action-types';

const dummyData = [
  { day: 26, isCurrent: false, timestamp: 1 },
  { day: 27, isCurrent: false, timestamp: 2 },
  { day: 28, isCurrent: false, timestamp: 3  },
  { day: 29, isCurrent: false, timestamp: 4  },
  { day: 30, isCurrent: false, timestamp: 5  },
  { day: 1, isCurrent: true, timestamp: 6 },
  { day: 2, isCurrent: true, timestamp: 7 },
  { day: 3, isCurrent: true, timestamp: 8 },
  { day: 4, isCurrent: true, timestamp: 9 },
  { day: 5, isCurrent: true, timestamp: 10 },
  { day: 6, isCurrent: true, timestamp: 11 },
  { day: 7, isCurrent: true, timestamp: 12 },
  { day: 8, isCurrent: true, timestamp: 13 },
  { day: 9, isCurrent: true, timestamp: 14},
];

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
const calendar = (state = dummyData, action) => {
  switch (action.type) {
    case ActionNames.UPDATE_CALENDAR:
      return action.calendar;
    default:
      return state;
  }
};

export default calendar;
