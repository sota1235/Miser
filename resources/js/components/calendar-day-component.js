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
  state: {
    isOpen: boolean,
  }

  constructor(props) {
    super(props);

    this.state = {
      isOpen: false,
    };
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
        <CalendarModal isOpen={this.state.isOpen} onRequestClose={e => this.handleClick(e)} />
      </li>
    );
  }
}

CalendarDay.propTypes = {
  isCurrent : PropTypes.bool.isRequired,
  day       : PropTypes.number.isRequired,
};

export default CalendarDay;
