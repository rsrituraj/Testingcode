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

defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {

     $ADMIN->add('localplugins', new admin_category('local_emailuser', new lang_string('pluginname', 'local_emailuser')));

    $settings = new admin_settingpage('local_emailuser_settings', get_string('pluginname', 'local_emailuser'));

    $settings->add(new admin_setting_configcheckbox(
        'local_emailuser/randomemailsend',
        get_string('randomemailsend', 'local_emailuser'),
        get_string('randomemailsend_desc', 'local_emailuser'),
        0
    ));

    $ADMIN->add('local_emailuser', $settings);
}


