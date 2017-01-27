// @flow weak
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
      <li className="saturday">Sa</li>
      <li className="sunday">Su</li>
    </ul>

    <ul className="days">
      {calendars.map((calendar) => {
        const { isCurrent, timestamp, day } = calendar;
        return (
          <CalendarDay
            isCurrent={isCurrent}
            timestamp={timestamp}
            key={timestamp}
            day={day}
          />
        );
      })}
    </ul>
  </div>
);

Calendar.propTypes = {
  calendars: PropTypes.arrayOf(PropTypes.shape({
    timestamp : PropTypes.number.isRequired,
    day       : PropTypes.number.isRequired,
    isCurrent : PropTypes.bool.isRequired,
  }).isRequired).isRequired,
};

export default Calendar;
