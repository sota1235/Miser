/**
 * @fileoverview Modal component for miser data.
 */
import React, { PropTypes } from 'react';
import ReactModal from 'react-modal';

/** @var {Object} */
const contentStyle = {
  top        : '20%',
  left       : '50%',
  margin     : '0 auto',
  marginLeft : '-150px',
  width      : '300px',
  height     : '300px',
  textAlign  : 'center',
};

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
    style={{
      content: contentStyle,
    }}
  >
    <p>Sample modal.</p>
  </ReactModal>
);

CalendarModal.propTypes = {
  isOpen         : PropTypes.bool.isRequired,
  onRequestClose : PropTypes.func.isRequired,
};

export default CalendarModal;
