/**
 * @fileoverview Header component on top page.
 */
import React, { PropTypes } from 'react';

const TopHeader = ({ year, month }) => (
  <div className="top-header">
    <p>Miser</p>
    <p>{ year }/{ month }</p>
  </div>
);

CalendarFooter.propTypes = {
  onClickPrev : PropTypes.string.isRequired,
  onClickNext : PropTypes.string.isRequired,
};

export default TopHeader;
