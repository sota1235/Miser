/**
 * @fileoverview Container for calendar-footer-component.
 */
import {connect} from 'react-redux';
import CalendarComponent from 'components/calendar-component';

const mapStateToProps = state => ({ calendars: state.calendar });

const CalendarContainer = connect(mapStateToProps)(CalendarComponent);

export default CalendarContainer;
