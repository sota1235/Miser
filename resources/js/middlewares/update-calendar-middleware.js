// @flow weak
/**
 * @description Update calendar on main page.
 */
import * as ActionNames from 'actions/action-types';
import { updateCalendar } from 'actions/actions';
import getCalendar from 'webutils/ajax/get-calendar';

const updateCalendarMiddleware = store => next => async (action) => {
  if (action.type === ActionNames.GO_TO_PREV_MONTH
    || action.type === ActionNames.GO_TO_NEXT_MONTH) {
    const result = next(action);
    console.log(store);
    const { year, month } = store.getState().currentCalendar;
    const calendar = await getCalendar(year, month);
    store.dispatch(updateCalendar(calendar));
    return result;
  }

  return next(action);
};

export default updateCalendarMiddleware;
