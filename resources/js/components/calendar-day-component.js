/**
 * @fileoverview Day component on calendar.
 */
import React, { PropTypes } from 'react';

const CalendarDay = ({ isCurrent, timestamp, day }) => (
  <li
    className={
      isCurrent ? 'days-is-current' : 'days-is-not-current'
    }
  >
    { day }
  </li>
);

CalendarDay.propTypes = {
  isCurrent : PropTypes.bool.isRequired,
  timestamp : PropTypes.string.isRequired,
  day       : PropTypes.number.isRequired,
};

export default CalendarDay;
