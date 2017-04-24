// @flow weak
/**
 * @fileoverview Container for calendar-footer-component.
 */
import { connect } from 'react-redux';
import React, { PropTypes } from 'react';
import getCalendar from 'webutils/ajax/get-calendar';
import { updateCalendar } from 'actions/actions';
import CalendarComponent from 'components/calendar-component';

const mapStateToProps = state => ({ calendars: state.calendar });

class CalendarContainer extends React.Component {
  componentDidMount() {
    getCalendar()
      .then((calendar) => {
        this.props.dispatch(updateCalendar(calendar));
      });
  }

  render() {
    const { calendars } = this.props;

    return (
      <CalendarComponent
        calendars={calendars}
      />
    );
  }
}

CalendarContainer.propTypes = {
  dispatch  : PropTypes.func,
  calendars : PropTypes.arrayOf(PropTypes.shape({
    timestamp : PropTypes.number.isRequired,
    day       : PropTypes.number.isRequired,
    isCurrent : PropTypes.bool.isRequired,
  }).isRequired).isRequired,
};

export default connect(mapStateToProps)(CalendarContainer);
