/**
 * @fileoverview Calendar footer component.
 */
import React, { PropTypes } from 'react';

const CalendarFooter = ({ onClickPrev, onClickNext }) => (
  <div className="level calendar-bar">
    <div className="level-left button is-primary is-outlined" onClick={onClickPrev}>
      Prev month
    </div>
    <div className="level-right button is-primary is-outlined" onClick={onClickNext}>
      Next month
    </div>
  </div>
);

CalendarFooter.propTypes = {
  onClickPrev : PropTypes.func,
  onClickNext : PropTypes.func,
};

export default CalendarFooter;
