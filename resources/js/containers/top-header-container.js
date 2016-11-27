/**
 * @fileoverview Container for top-header-component.
 */
import {connect} from 'react-redux';
import TopHeaderComponent from 'components/top-header-component';

const mapStateToProps = state => ({
  year  : state.currentCalendar.year,
  month : state.currentCalendar.month,
});

const TopHeaderContainer = connect(mapStateToProps)(TopHeaderComponent);

export default TopHeaderContainer;
