/**
 * @fileoverview Getting calendar data from server.
 */
import axios from 'axios';
import {isNull} from 'lodash';
import * as routes from 'config/routes';

/**
 * @param {null|number} year
 * @param {null|number} month
 * @return {Promise<Array|Error>}
 */
async function getCalendar(year = null, month = null) {
  const query = (isNull(year) && isNull(month)) ? {} : {year, month};
  const response = await axios.get(routes.getCalendar, query);

  return response.data;
}

export default getCalendar;
