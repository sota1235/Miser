/**
 * @fileoverview Calendar footer component.
 */
import React, { PropTypes } from 'react';

const CalendarFooter = ({ links }) => (
  <div className="level calendar-bar">
    <div className="level-left button is-primary is-outlined">
      <a href={ links.prevMonth }>前の月</a>
    </div>
    <div className="level-right button is-primary is-outlined">
      <a href={ links.nextMonth }>次の月</a>
    </div>
  </div>
);

CalendarFooter.propTypes = {
  links: PropTypes.shape({
    prevMonth : PropTypes.string.isRequired,
    nextMonth : PropTypes.string.isRequired,
  }).isRequired,
};

export default CalendarFooter;
