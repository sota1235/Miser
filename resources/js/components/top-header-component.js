// @flow weak
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

TopHeader.propTypes = {
  year  : PropTypes.number.isRequired,
  month : PropTypes.number.isRequired,
};

export default TopHeader;
