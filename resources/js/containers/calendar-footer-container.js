// @flow weak
/**
 * @fileoverview Container for calendar-footer-component.
 */
import { connect } from 'react-redux';
import CalendarFooterComponent from 'components/calendar-footer-component';
import { goToPrevMonth, goToNextMonth } from 'actions/actions';

const mapStateToProps = () => ({});

const mapDispatchToProps = dispatch => ({
  onClickPrev() {
    dispatch(goToPrevMonth());
  },
  onClickNext() {
    dispatch(goToNextMonth());
  },
});

const CalendarFooterContainer =
  connect(mapStateToProps, mapDispatchToProps)(CalendarFooterComponent);

export default CalendarFooterContainer;
