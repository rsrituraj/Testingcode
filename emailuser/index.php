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
 * Version information
 *
 * @package   local_emailuser
 * @author    Rituraj Saxena (rituraj793@gmail.com)
 * @copyright 2024 Rituraj Saxena
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../config.php');
require_once($CFG->dirroot .'/local/emailuser/lib.php');
require_once($CFG->dirroot .'/local/emailuser/form.php');


require_login();

// Set up page details.
$PAGE->set_pagelayout('standard');
$PAGE->set_context(context_system::instance());
$PAGE->set_url(new moodle_url('/local/emailuser/index.php'));
$PAGE->set_title(get_string('pluginname', 'local_emailuser'));
$PAGE->set_heading(get_string('pluginname', 'local_emailuser'));

// Get renderer data by emailuser plugin.
$renderer = $PAGE->get_renderer('local_emailuser');

// Setup form.
$form = new user_email();

echo $OUTPUT->header();

// List of users.
echo $renderer->get_emailuser_list();

// Check if a CSV file has been uploaded.
if ($csvfile = $form->get_file_content('emailuser')) {

    // Process the CSV info to csv handler and display the upload link and user import table.
    $userdata = handle_csv_file($csvfile);

    echo $renderer->user_uploaded_table($userdata);

} else {
    // Display the upload form.
    $form->display();
}

echo $OUTPUT->footer();
