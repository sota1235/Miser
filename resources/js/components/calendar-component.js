/**
 * @fileoverview Calendar component.
 */
import React, { PropTypes } from 'react';
import CalendarDay          from 'components/calendar-day-component';

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
        const { isCurrent, fulldate, day } = calendar;
        return (
          <CalendarDay
            isCurrent={ isCurrent }
            fulldate={ fulldate }
            key={ fulldate }
            day={ day }
          />
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
