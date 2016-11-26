/**
 * @fileoverview Action creaters for Redux.
 */
import * as ActionNames from 'actions/action-types';

/**
 * @description Dispatch going to prev month.
 * @return {Object}
 */
export function goToPrevMonth() {
  return { type: ActionNames.GO_TO_PREV_MONTH };
}

/**
 * @description Dispatch going to next month.
 * @return {Object}
 */
export function goToNextMonth() {
  return { type: ActionNames.GO_TO_NEXT_MONTH };
}

/**
 * @description Update calendar.
 * @param {number} year
 * @param {number} month
 * @return {Object}
 */
export function updateCalendar(calendar) {
  return {
    type: ActionNames.UPDATE_CALENDAR,
    calendar,
  };
}
