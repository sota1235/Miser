/**
 * @description Update calendar on main page.
 */
import * as ActionNames from 'actions/action-types';
import {updateCalendar} from 'actions/actions';

const updateCalendar = store => next => action => {
  if (action.type === ActionNames.GO_TO_PREV_MONTH
    || action.type === ActionNames.GO_TO_NEXT_MONTH) {
    // TODO: get data form server
    const {year, month} = action;
    const calendar = [];
    store.dispatch(updateCalendar(calendar));
  }

  return next(action);
};

export default updateCalendar;
