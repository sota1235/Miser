/**
 * @description Update calendar on main page.
 */
import * as ActionNames from 'actions/action-types';
import {updateCalendar} from 'actions/actions';
import getCalendar from 'webutils/ajax/get-calendar';

const updateCalendarMiddleware = store => next => async action => {
  if (action.type === ActionNames.GO_TO_PREV_MONTH
    || action.type === ActionNames.GO_TO_NEXT_MONTH) {
    const {year, month} = action;
    const calendar = await getCalendar(year, month);
    store.dispatch(updateCalendar(calendar));
  }

  return next(action);
};

export default updateCalendarMiddleware;
