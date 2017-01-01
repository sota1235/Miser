/**
 * @fileoverview Modal component for miser data.
 */
import React, { PropTypes } from 'react';
import ReactModal from 'react-modal';

/**
 * @param {boolean} isOpen
 * @param {Function} onRequestClose
 * @return {React.Component}
 */
const CalendarModal = ({ isOpen, onRequestClose }) => (
  <ReactModal
    isOpen={isOpen}
    contentLabel=''
    onRequestClose={onRequestClose}
  >
    <p>Sample modal.</p>
  </ReactModal>
);

CalendarModal.propTypes = {
  isOpen         : PropTypes.bool.isRequired,
  onRequestClose : PropTypes.func.isRequired,
};

export default CalendarModal;
