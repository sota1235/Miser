/**
 * @fileoverview Container for calendar-footer-component.
 */
import {connect} from 'react-redux';
import CalendarFooterComponent from 'components/calendar-footer-component';
import {goToPrevMonth, goToNextMonth} from 'actions/actions';

const mapStateToProps = () => ({});

const mapDispatchToProps = (dispatch, ownProps) => ({
  onClickPrev() {
    dispatch(goToPrevMonth());
  },
  onClickNext() {
    dispatch(goToPrevMonth());
  },
});

const CalendarFooterContainer = connect(mapStateToProps, mapDispatchToProps)(CalendarFooterComponent);

export default CalendarFooterContainer;
