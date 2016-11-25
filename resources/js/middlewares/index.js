/**
 * @fileoverview Combine middlewares and export.
 */
import logger from 'middlewares/logger';
import updateCalendar from 'middlewares/update-calendar-middleware';

export default [logger, updateCalendar];
