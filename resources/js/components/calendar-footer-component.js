/**
 * @fileoverview Calendar footer component.
 */
import React, { PropTypes } from 'react';

const CalendarFooter = ({ prevMonth, nextMonth, onClickPrev, onClickNext }) => (
  <div className="level calendar-bar">
    <div className="level-left button is-primary is-outlined" onClick={onClickPrev}>
      前の月
    </div>
    <div className="level-right button is-primary is-outlined" onClick={onClickNext}>
      次の月
    </div>
  </div>
);

CalendarFooter.propTypes = {
  prevMonth : PropTypes.shape({
    year  : PropTypes.number.isRequired,
    month : PropTypes.number.isRequired,
  }),
  nextMonth : PropTypes.shape({
    year  : PropTypes.number.isRequired,
    month : PropTypes.number.isRequired,
  }),
  onClickPrev : PropTypes.func,
  onClickNext : PropTypes.func,
};

export default CalendarFooter;
