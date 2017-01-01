/**
 * @fileoverview Day component on calendar.
 */
import React, { PropTypes } from 'react';
import CalendarModal        from './calendar-modal-component';

/**
 * @param {boolean} isCurrent
 * @param {int} timestamp
 * @param {int} day
 * @param {boolean} isOpen
 * @return {React.Component}
 */
class CalendarDay extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      isOpen: props.isOpen,
    }

    this.handleClick = this.handleClick.bind(this);
  }

  handleClick() {
    this.setState({
      isOpen: !this.state.isOpen,
    });
  }

  render() {
    const { isCurrent, timestamp, day } = this.props;

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
};

CalendarDay.propTypes = {
  isCurrent : PropTypes.bool.isRequired,
  timestamp : PropTypes.number.isRequired,
  day       : PropTypes.number.isRequired,
};

export default CalendarDay;
