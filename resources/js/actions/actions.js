/**
 * @fileoverview Action creaters for Redux.
 */
import * as ActionNames from 'actions/action-types';

/**
 * @description Dispatch going to prev month.
 * @param {number} year
 * @param {number} month
 * @return {Object}
 */
export function goToPrevMonth(year, month) {
  return {
    type: ActionNames.GO_TO_PREV_MONTH,
    year, month,
  };
}

/**
 * @description Dispatch going to next month.
 * @param {number} year
 * @param {number} month
 * @return {Object}
 */
export function goToNextMonth(year, month) {
  return {
    type: ActionNames.GO_TO_NEXT_MONTH,
    year, month,
  };
}
