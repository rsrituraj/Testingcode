<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * form to provide file uploading
 *
 * @package   local_emailuser
 * @author    Rituraj Saxena
 * @copyright 2024 Rituraj Saxena
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir.'/formslib.php');

class user_email extends moodleform {
    /**
     * Form definition function.
     */
    public function definition() {
        // Initialize the form.
        $mform = $this->_form;

        // Add file picker element for uploading CSV file.
        $mform->addElement('filepicker', 'emailuser', get_string('csv', 'local_emailuser'));
        $mform->setType('emailuser', PARAM_FILE, ['accept' => '.csv']);
        $mform->addRule('emailuser', null, 'required', null, 'client');

        // Add action buttons to the form.
        $this->add_action_buttons(false, get_string('save', 'local_emailuser'));
    }
}
