/**
 * @fileoverview Calendar component.
 */
import React, { PropTypes } from 'react';

const Calendar = ({ calendars }) => (
  <div className="calendar">
    <ul className="weekdays">
      <li>Mo</li>
      <li>Tu</li>
      <li>We</li>
      <li>Th</li>
      <li>Fr</li>
      <li>Sa</li>
      <li>Su</li>
    </ul>

    <ul className="days">
      {calendars.map(calendar => {
        const className = calendar.isCurrent ?
          'days-is-current' : 'days-is-not-current';

        return (
          <li className={ className } key={ calendar.fulldate }>
            { calendar.day }
          </li>
        );
      })}
    </ul>
  </div>
);

Calendar.propTypes = {
  calendars: PropTypes.arrayOf(PropTypes.shape({
    fulldate  : PropTypes.string.isRequired,
    day       : PropTypes.number.isRequired,
    isCurrent : PropTypes.bool.isRequired,
  }).isRequired).isRequired,
};

export default Calendar;
