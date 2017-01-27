// @flow weak
/**
 * @fileoverview Day component on calendar.
 */
import React, { PropTypes } from 'react';
import CalendarModal        from './calendar-modal-component';

/**
 * @Class CalendarDay
 * @param {boolean} isCurrent
 * @param {int} day
 */
class CalendarDay extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      isOpen: false,
    };
    this.handleClick = this.handleClick.bind(this);
  }

  handleClick() {
    this.setState({
      isOpen: !this.state.isOpen,
    });
  }

  render() {
    const { isCurrent, day } = this.props;

    return (
      <li
        className={
          isCurrent ? 'days-is-current' : 'days-is-not-current'
        }
        onClick={this.handleClick}
      >
        { day }
        <CalendarModal isOpen={this.state.isOpen} onRequestClose={this.handleClick} />
      </li>
    );
  }
}

CalendarDay.propTypes = {
  isCurrent : PropTypes.bool.isRequired,
  day       : PropTypes.number.isRequired,
};

export default CalendarDay;
