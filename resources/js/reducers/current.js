/**
 * @fileoverview Reducer for data of current calendar.
 */
import moment from 'moment';
import { GO_TO_PREV_MONTH, GO_TO_NEXT_MONTH } from 'actions/action-types';

/** @var {Moment} Current date. */
const currentDate = moment();

const initialState = {
  year  : currentDate.year(),
  month : currentDate.month() + 1,
};

/**
 * @description Get data of next month from current date.
 * @param {number} year
 * @param {number} month
 * @return {Object}
 */
function getNextMonth(year, month) {
  const currentDate = moment(`${year}-${month}`, 'YYYY-MM');
  const nextMonth = currentDate.add(1, 'M');
  return {
    year  : nextMonth.year(),
    month : nextMonth.month() + 1,
  };
}

/**
 * @description Get data of previous month from current date.
 * @param {number} year
 * @param {number} month
 * @return {Object}
 */
function getPrevMonth(year, month) {
  const currentDate = moment(`${year}-${month}`, 'YYYY-MM');
  const prevMonth = currentDate.subtract(1, 'M');
  return {
    year  : prevMonth.year(),
    month : prevMonth.month() + 1,
  };
}

/**
 * @description Make state of current calendar.
 * @param {Object} state
 * @param {Object} action
 * @return {Object}
 */
const currentCalendar = (state = initialState, action) => {
  switch (action.type) {
    case GO_TO_PREV_MONTH:
      const prevMonth = getPrevMonth(state.year, state.month);
      return {
        year  : prevMonth.year,
        month : prevMonth.month,
      };
    case GO_TO_NEXT_MONTH:
      const nextMonth = getNextMonth(state.year, state.month);
      return {
        year  : nextMonth.year,
        month : nextMonth.month,
      };
    default:
      return state;
  }
};

export default currentCalendar;
