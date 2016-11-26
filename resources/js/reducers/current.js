/**
 * @fileoverview Reducer for data of current calendar.
 */
import moment from 'moment';
import {GO_TO_PREV_MONTH, GO_TO_NEXT_MONTH} from 'actions/action-types';

/** @var {Moment} Current date. */
const currentDate = moment();

const initialState = {
  year  : currentDate.year(),
  month : currentDate.month(),
};

/**
 * @description Make state of current calendar.
 * @param {Object} state
 * @param {Object} action
 * @return {Object}
 */
const currentCalendar = (state = initialState, action) => {
  switch (action.type) {
    case GO_TO_PREV_MONTH:
      return {
        year  : action.year,
        month : action.month
      };
    case GO_TO_NEXT_MONTH:
      return {
        year  : action.year,
        month : action.month
      };
    default:
      return state;
  }
};

export default currentCalendar;
