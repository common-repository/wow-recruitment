<?php

/*
 Plugin Name: WOWRecruitment
 Plugin URI: http://www.etherjammer.com/
 Description: Widget plugin for WOW guild recruitment status
 Author: Chris Anthony
 Version: 1.0
 Author URI: http://www.twitter.com/etherjammer
 License: GPL2
*/

/*  Copyright 2010  Chris Anthony  (email : chris@etherjammer.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

load_plugin_textdomain('wowrec','/wp-content/plugins/wowrecruitment/intl/');
	
class widget_WOWRec extends WP_Widget {

	function widget_WOWRec() {
		parent::WP_Widget(false, $name = 'WOWRec');
	}
	
	function widget($args,$instance) {
		$options = get_option('wowrec');
		foreach ($options as $key => $value) {
			if ($key == 'bgc' || $key == 'bdc') {
				$options[$key] = wp_filter_nohtml_kses($value);
			} else {
				$options[$key] = ($value == 1 ? 1 : 2);
			}
		}
		echo $beforewidget . $beforetitle;
		echo "<!-- WOWRec! -->";
		echo "<li id=\"WOWRec\" class=\"recsubframe\"><h2>";
		echo __("Current Recruitment",'wowrec');
		echo "</h2>";
		echo $aftertitle;
		$anyrec = 0;
		echo "<div>";
		if ($options['bDK'] == 1 && $options['fDK'] == 1 && $options['uDK'] == 1) { 
			echo "<span style=\"margin-left: 20px; color: #C41F3B;\">" . __("Death Knight (Any)",'wowrec') . "</span><br />"; $anyrec = 1; 
		} else {
			if ($options['bDK'] == 1) { echo "<span style=\"margin-left: 20px; color: #C41F3B;\">" . __("Blood DK",'wowrec') . "</span><br />"; $anyrec = 1; }
			if ($options['fDK'] == 1) { echo "<span style=\"margin-left: 20px; color: #C41F3B;\">" . __("Frost DK",'wowrec') . "</span><br />"; $anyrec = 1; }
			if ($options['uDK'] == 1) { echo "<span style=\"margin-left: 20px; color: #C41F3B;\">" . __("Unholy DK",'wowrec') . "</span><br />"; $anyrec = 1; }
		}
		if ($options['bDr'] == 1 && $options['brDr'] == 1 && $options['cDr'] == 1 && $options['rDr'] == 1) { 
			echo "<span style=\"margin-left: 20px; color: #FF7D0A;\">" . __("Druid (Any)",'wowrec') . "</span><br />"; $anyrec = 1; 
		} else {
			if ($options['bDr'] == 1) { echo "<span style=\"margin-left: 20px; color: #FF7D0A;\">" . __("Balance Druid",'wowrec') . "</span><br />"; $anyrec = 1; }
			if ($options['brDr'] == 1) { echo "<span style=\"margin-left: 20px; color: #FF7D0A;\">" . __("Feral Druid (Bear)",'wowrec') . "</span><br />"; $anyrec = 1; }
			if ($options['cDr'] == 1) { echo "<span style=\"margin-left: 20px; color: #FF7D0A;\">" . __("Feral Druid (Cat)",'wowrec') . "</span><br />"; $anyrec = 1; }
			if ($options['rDr'] == 1) { echo "<span style=\"margin-left: 20px; color: #FF7D0A;\">" . __("Restoration Druid",'wowrec') . "</span><br />"; $anyrec = 1; }
		}
		if ($options['bHu'] == 1 && $options['mHu'] == 1 && $options['sHu'] == 1) { 
			echo "<span style=\"margin-left: 20px; color: #ABD473;\">" . __("Hunter (Any)",'wowrec') . "</span><br />"; $anyrec = 1; 
		} else {
			if ($options['bHu'] == 1) { echo "<span style=\"margin-left: 20px; color: #ABD473;\">" . __("Beast Mastery Hunter",'wowrec') . "</span><br />"; $anyrec = 1; }
			if ($options['mHu'] == 1) { echo "<span style=\"margin-left: 20px; color: #ABD473;\">" . __("Marksmanship Hunter",'wowrec') . "</span><br />"; $anyrec = 1; }
			if ($options['sHu'] == 1) { echo "<span style=\"margin-left: 20px; color: #ABD473;\">" . __("Survival Hunter",'wowrec') . "</span><br />"; $anyrec = 1; }
		}
		if ($options['aMa'] == 1 && $options['fMa'] == 1 && $options['frMa'] == 1) { 
			echo "<span style=\"margin-left: 20px; color: #69CCF0;\">" . __("Mage (Any)",'wowrec') . "</span><br />"; $anyrec = 1; 
		} else {
			if ($options['aMa'] == 1) { echo "<span style=\"margin-left: 20px; color: #69CCF0;\">" . __("Arcane Mage",'wowrec') . "</span><br />"; $anyrec = 1; }
			if ($options['fMa'] == 1) { echo "<span style=\"margin-left: 20px; color: #69CCF0;\">" . __("Fire Mage",'wowrec') . "</span><br />"; $anyrec = 1; }
			if ($options['frMa'] == 1) { echo "<span style=\"margin-left: 20px; color: #69CCF0;\">" . __("Frost Mage",'wowrec') . "</span><br />"; $anyrec = 1; }
		}
		if ($options['hPa'] == 1 && $options['pPa'] == 1 && $options['rPa'] == 1) { 
			echo "<span style=\"margin-left: 20px; color: #F58CBA;\">" . __("Paladin (Any)",'wowrec') . "</span><br />"; $anyrec = 1; 
		} else {
			if ($options['hPa'] == 1) { echo "<span style=\"margin-left: 20px; color: #F58CBA;\">" . __("Holy Paladin",'wowrec') . "</span><br />"; $anyrec = 1; }
			if ($options['pPa'] == 1) { echo "<span style=\"margin-left: 20px; color: #F58CBA;\">" . __("Protection Paladin",'wowrec') . "</span><br />"; $anyrec = 1; }
			if ($options['rPa'] == 1) { echo "<span style=\"margin-left: 20px; color: #F58CBA;\">" . __("Retribution Paladin",'wowrec') . "</span><br />"; $anyrec = 1; }
		}
		if ($options['dPr'] == 1 && $options['hPr'] == 1 && $options['sPr'] == 1) { 
			echo "<span style=\"margin-left: 20px; color: #FFFFFF;\">" . __("Priest (Any)",'wowrec') . "</span><br />"; $anyrec = 1; 
		} else {
			if ($options['dPr'] == 1) { echo "<span style=\"margin-left: 20px; color: #FFFFFF;\">" . __("Discipline Priest",'wowrec') . "</span><br />"; $anyrec = 1; }
			if ($options['hPr'] == 1) { echo "<span style=\"margin-left: 20px; color: #FFFFFF;\">" . __("Holy Priest",'wowrec') . "</span><br />"; $anyrec = 1; }
			if ($options['sPr'] == 1) { echo "<span style=\"margin-left: 20px; color: #FFFFFF;\">" . __("Shadow Priest",'wowrec') . "</span><br />"; $anyrec = 1; }
		}
		if ($options['aRo'] == 1 && $options['cRo'] == 1 && $options['sro'] == 1) { 
			echo "<span style=\"margin-left: 20px; color: #FFF569;\">" . __("Rogue (Any)",'wowrec') . "</span><br />"; $anyrec = 1; 
		} else {
			if ($options['aRo'] == 1) { echo "<span style=\"margin-left: 20px; color: #FFF569;\">" . __("Assassination Rogue",'wowrec') . "</span><br />"; $anyrec = 1; }
			if ($options['cRo'] == 1) { echo "<span style=\"margin-left: 20px; color: #FFF569;\">" . __("Combat Rogue",'wowrec') . "</span><br />"; $anyrec = 1; }
			if ($options['sRo'] == 1) { echo "<span style=\"margin-left: 20px; color: #FFF569;\">" . __("Subtlety Rogue",'wowrec') . "</span><br />"; $anyrec = 1; }
		}
		if ($options['elSh'] == 1 && $options['enSh'] == 1 && $options['rSh'] == 1) { 
			echo "<span style=\"margin-left: 20px; color: #2459FF;\">" . __("Shaman (Any)",'wowrec') . "</span><br />"; $anyrec = 1; 
		} else {
			if ($options['elSh'] == 1) { echo "<span style=\"margin-left: 20px; color: #2459FF;\">" . __("Elemental Shaman",'wowrec') . "</span><br />"; $anyrec = 1; }
			if ($options['enSh'] == 1) { echo "<span style=\"margin-left: 20px; color: #2459FF;\">" . __("Enhancement Shaman",'wowrec') . "</span><br />"; $anyrec = 1; }
			if ($options['rSh'] == 1) { echo "<span style=\"margin-left: 20px; color: #2459FF;\">" . __("Restoration Shaman",'wowrec') . "</span><br />"; $anyrec = 1; }
		}
		if ($options['aWk'] == 1 && $options['dmWk'] == 1 && $options['dsWk'] == 1) { 
			echo "<span style=\"margin-left: 20px; color: #9482C9;\">" . __("Warlock (Any)",'wowrec') . "</span><br />"; $anyrec = 1; 
		} else {
			if ($options['aWk'] == 1) { echo "<span style=\"margin-left: 20px; color: #9482C9;\">" . __("Affliction Warlock",'wowrec') . "</span><br />"; $anyrec = 1; }
			if ($options['dmWk'] == 1) { echo "<span style=\"margin-left: 20px; color: #9482C9;\">" . __("Demonology Warlock",'wowrec') . "</span><br />"; $anyrec = 1; }
			if ($options['dsWk'] == 1) { echo "<span style=\"margin-left: 20px; color: #9482C9;\">" . __("Destruction Warlock",'wowrec') . "</span><br />"; $anyrec = 1; }
		}
		if ($options['aWr'] == 1 && $options['fWr'] == 1 && $options['pWr'] == 1) { 
			echo "<span style=\"margin-left: 20px; color: #C79C6E;\">" . __("Warrior (Any)",'wowrec') . "</span><br />"; $anyrec = 1; 
		} else {
			if ($options['aWr'] == 1) { echo "<span style=\"margin-left: 20px; color: #C79C6E;\">" . __("Arms Warrior",'wowrec') . "</span><br />"; $anyrec = 1; }
			if ($options['fWr'] == 1) { echo "<span style=\"margin-left: 20px; color: #C79C6E;\">" . __("Fury Warrior",'wowrec') . "</span><br />"; $anyrec = 1; }
			if ($options['pWr'] == 1) { echo "<span style=\"margin-left: 20px; color: #C79C6E;\">" . __("Protection Warrior",'wowrec') . "</span><br />"; $anyrec = 1; }
		}
		if ($anyrec == 0) { echo "<span style=\"margin-left: 20px; color: #FF0000;\">" . __("No current recruitment",'wowrec') . "</span><br />"; }
		echo "</div>";
		echo "</li>" . $afterwidget;

	}
	
	function update($new_instance,$old_instance) {
		return $new_instance;
	}
	
	function form($instance) {
		echo __("Recruitment status is changed under Settings > WOW Recruitment.",'wowrec');
	}
}

function WOWRec_init() {
	register_setting('wowrec_options','wowrec','WOWRec_validate');
}

function WOWRec_validate($input) {
	return $input;
}

function WOWRec_add_page() {
	add_options_page('WOW Recruitment', 'WOW Recruitment', 'manage_options', 'wowrec_options', 'WOWRec_do_page');
}

function WOWRec_do_page() {
?>
<div class="wrap">
<h2>WOW Recruitment</h2>
<form method="post" action="options.php">
<?php settings_fields('wowrec_options'); ?>
<?php $options = get_option('wowrec'); ?>
<?php foreach ($options as $key => $value) { $options[$key] = ($value == 1 ? 1 : 2); } ?>
<div style="position: relative; float: right; background-color: #cccccc; border: #888888 solid 1px; text-align: center; font-size: 0.8em; padding: 2px;">
	Comments about WOW Recruitment?<br />
	<a href="http://ducttape.etherjammer.com/2010/05/wordpress-plugin-recruitment-status">Leave them here!</a>
</div>
<table class="form-table" style="max-width: 25%;">
		<tr><td><strong>Class</strong></td><td><strong>Recruiting</strong></td><td><strong>Not Recruiting</strong></td></tr>
		<tr style="background-color: #cccccc;">
		<td><label for="<?php echo $options['bDK']; ?>"><?php _e('Death Knight - Blood','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[bDK]1" name="wowrec[bDK]" value="1" <?php if ($options['bDK'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[bDK]2" name="wowrec[bDK]" value="2" <?php if ($options['bDK'] == 2 || $options['bDK'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr>
		<td><label for="<?php echo $options['fDK']; ?>"><?php _e('Death Knight - Frost','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[fDK]1" name="wowrec[fDK]" value="1" <?php if ($options['fDK'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[fDK]2" name="wowrec[fDK]" value="2" <?php if ($options['fDK'] == 2 || $options['fDK'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr style="background-color: #cccccc;">
		<td><label for="wowrec[uDK]"><?php _e('Death Knight - Unholy','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[uDK]1" name="wowrec[uDK]" value="1" <?php if ($options['uDK'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[uDK]2" name="wowrec[uDK]" value="2" <?php if ($options['uDK'] == 2 || $options['uDK'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr>
		<td><label for="wowrec[bDr]"><?php _e('Druid - Balance','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[bDr]1" name="wowrec[bDr]" value="1" <?php if ($options['bDr'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[bDr]2" name="wowrec[bDr]" value="2" <?php if ($options['bDr'] == 2 || $options['bDr'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr style="background-color: #cccccc;">
		<td><label for="wowrec[brDr]"><?php _e('Druid - Bear','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[brDr]1" name="wowrec[brDr]" value="1" <?php if ($options['brDr'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[brDr]2" name="wowrec[brDr]" value="2" <?php if ($options['brDr'] == 2 || $options['brDr'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr>
		<td><label for="wowrec[cDr]"><?php _e('Druid - Cat','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[cDr]1" name="wowrec[cDr]" value="1" <?php if ($options['cDr'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[cDr]2" name="wowrec[cDr]" value="2" <?php if ($options['cDr'] == 2 || $options['cDr'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr style="background-color: #cccccc;">
		<td><label for="wowrec[rDr]"><?php _e('Druid - Resto','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[rDr]1" name="wowrec[rDr]" value="1" <?php if ($options['rDr'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[rDr]2" name="wowrec[rDr]" value="2" <?php if ($options['rDr'] == 2 || $options['rDr'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr>
		<td><label for="wowrec[bHu]"><?php _e('Hunter - BM','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[bHu]1" name="wowrec[bHu]" value="1" <?php if ($options['bHu'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[bHu]2" name="wowrec[bHu]" value="2" <?php if ($options['bHu'] == 2 || $options['bHu'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr style="background-color: #cccccc;">
		<td><label for="wowrec[mHu]"><?php _e('Hunter - MM','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[mHu]1" name="wowrec[mHu]" value="1" <?php if ($options['mHu'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[mHu]2" name="wowrec[mHu]" value="2" <?php if ($options['mHu'] == 2 || $options['mHu'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr>
		<td><label for="wowrec[sHu]"><?php _e('Hunter - Surv','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[sHu]1" name="wowrec[sHu]" value="1" <?php if ($options['sHu'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[sHu]2" name="wowrec[sHu]" value="2" <?php if ($options['sHu'] == 2 || $options['sHu'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr style="background-color: #cccccc;">
		<td><label for="wowrec[aMa]"><?php _e('Mage - Arcane','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[aMa]1" name="wowrec[aMa]" value="1" <?php if ($options['aMa'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[aMa]2" name="wowrec[aMa]" value="2" <?php if ($options['aMa'] == 2 || $options['aMa'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr>
		<td><label for="wowrec[fMa]"><?php _e('Mage - Fire','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[fMa]1" name="wowrec[fMa]" value="1" <?php if ($options['fMa'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[fMa]2" name="wowrec[fMa]" value="2" <?php if ($options['fMa'] == 2 || $options['fMa'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr style="background-color: #cccccc;">
		<td><label for="wowrec[frMa]"><?php _e('Mage - Frost','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[frMa]1" name="wowrec[frMa]" value="1" <?php if ($options['frMa'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[frMa]2" name="wowrec[frMa]" value="2" <?php if ($options['frMa'] == 2 || $options['frMa'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr>
		<td><label for="wowrec[hPa]"><?php _e('Paladin - Holy','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[hPa]1" name="wowrec[hPa]" value="1" <?php if ($options['hPa'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[hPa]2" name="wowrec[hPa]" value="2" <?php if ($options['hPa'] == 2 || $options['hPa'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr style="background-color: #cccccc;">
		<td><label for="wowrec[pPa]"><?php _e('Paladin - Prot','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[pPa]1" name="wowrec[pPa]" value="1" <?php if ($options['pPa'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[pPa]2" name="wowrec[pPa]" value="2" <?php if ($options['pPa'] == 2 || $options['pPa'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr>
		<td><label for="wowrec[rPa]"><?php _e('Paladin - Ret','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[rPa]1" name="wowrec[rPa]" value="1" <?php if ($options['rPa'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[rPa]2" name="wowrec[rPa]" value="2" <?php if ($options['rPa'] == 2 || $options['rPa'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr style="background-color: #cccccc;">
		<td><label for="wowrec[dPr]"><?php _e('Priest - Disc','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[dPr]1" name="wowrec[dPr]" value="1" <?php if ($options['dPr'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[dPr]2" name="wowrec[dPr]" value="2" <?php if ($options['dPr'] == 2 || $options['dPr'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr>
		<td><label for="wowrec[hPr]"><?php _e('Priest - Holy','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[hPr]1" name="wowrec[hPr]" value="1" <?php if ($options['hPr'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[hPr]2" name="wowrec[hPr]" value="2" <?php if ($options['hPr'] == 2 || $options['hPr'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr style="background-color: #cccccc;">
		<td><label for="wowrec[sPr]"><?php _e('Priest - Shadow','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[sPr]1" name="wowrec[sPr]" value="1" <?php if ($options['sPr'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[sPr]2" name="wowrec[sPr]" value="2" <?php if ($options['sPr'] == 2 || $options['sPr'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr>
		<td><label for="wowrec[aRo]"><?php _e('Rogue - Assass.','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[aRo]1" name="wowrec[aRo]" value="1" <?php if ($options['aRo'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[aRo]2" name="wowrec[aRo]" value="2" <?php if ($options['aRo'] == 2 || $options['aRo'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr style="background-color: #cccccc;">
		<td><label for="wowrec[cRo]"><?php _e('Rogue - Combat','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[cRo]1" name="wowrec[cRo]" value="1" <?php if ($options['cRo'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[cRo]2" name="wowrec[cRo]" value="2" <?php if ($options['cRo'] == 2 || $options['cRo'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr>
		<td><label for="wowrec[sRo]"><?php _e('Rogue - Subtlety','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[sRo]1" name="wowrec[sRo]" value="1" <?php if ($options['sRo'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[sRo]2" name="wowrec[sRo]" value="2" <?php if ($options['sRo'] == 2 || $options['sRo'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr style="background-color: #cccccc;">
		<td><label for="wowrec[enSh]"><?php _e('Shaman - Enh','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[enSh]1" name="wowrec[enSh]" value="1" <?php if ($options['enSh'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[enSh]2" name="wowrec[enSh]" value="2" <?php if ($options['enSh'] == 2 || $options['enSh'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr>
		<td><label for="wowrec[elSh]"><?php _e('Shaman - Ele','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[elSh]1" name="wowrec[elSh]" value="1" <?php if ($options['elSh'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[elSh]2" name="wowrec[elSh]" value="2" <?php if ($options['elSh'] == 2 || $options['elSh'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr style="background-color: #cccccc;">
		<td><label for="wowrec[rSh]"><?php _e('Shaman - Resto','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[rSh]1" name="wowrec[rSh]" value="1" <?php if ($options['rSh'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[rSh]2" name="wowrec[rSh]" value="2" <?php if ($options['rSh'] == 2 || $options['rSh'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr>
		<td><label for="wowrec[aWk]"><?php _e('Warlock - Aff','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[aWk]1" name="wowrec[aWk]" value="1" <?php if ($options['aWk'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[aWk]2" name="wowrec[aWk]" value="2" <?php if ($options['aWk'] == 2 || $options['aWk'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr style="background-color: #cccccc;">
		<td><label for="wowrec[dmWk]"><?php _e('Warlock - Demo','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[dmWk]1" name="wowrec[dmWk]" value="1" <?php if ($options['dmWk'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[dmWk]2" name="wowrec[dmWk]" value="2" <?php if ($options['dmWk'] == 2 || $options['dmWk'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr>
		<td><label for="wowrec[dsWk]"><?php _e('Warlock - Destr','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[dsWk]1" name="wowrec[dsWk]" value="1" <?php if ($options['dsWk'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[dsWk]2" name="wowrec[dsWk]" value="2" <?php if ($options['dsWk'] == 2 || $options['dsWk'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr style="background-color: #cccccc;">
		<td><label for="wowrec[aWr]"><?php _e('Warrior - Arms','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[aWr]1" name="wowrec[aWr]" value="1" <?php if ($options['aWr'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[aWr]2" name="wowrec[aWr]" value="2" <?php if ($options['aWr'] == 2 || $options['aWr'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr>
		<td><label for="wowrec[fWr]"><?php _e('Warrior - Fury','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[fWr]1" name="wowrec[fWr]" value="1" <?php if ($options['fWr'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[fWr]2" name="wowrec[fWr]" value="2" <?php if ($options['fWr'] == 2 || $options['fWr'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		<tr style="background-color: #cccccc;">
		<td><label for="wowrec[pWr]"><?php _e('Warrior - Prot','wowrec'); ?></label></td>
		<td><input type="radio" id="wowrec[pWr]1" name="wowrec[pWr]" value="1" <?php if ($options['pWr'] == 1) : ?>CHECKED <?php endif; ?> /></td>
		<td><input type="radio" id="wowrec[pWr]2" name="wowrec[pWr]" value="2" <?php if ($options['pWr'] == 2 || $options['pWr'] == '') : ?>CHECKED <?php endif; ?> /></td>
		</tr>
		</table>

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes','wowrec') ?>" />
</p>
</form>
</div>
<?php
}

add_action('widgets_init', create_function('', 'return register_widget("widget_WOWRec");'));
if (is_admin()) {
	add_action('admin_init', 'WOWRec_init');
	add_action('admin_menu', 'WOWRec_add_page');
}
	
/*function widget_WOWRec_register() {
	register_sidebar_widget('WOWRec', 'widget_WOWRec');
}

add_action("plugins_loaded", widget_WOWRec_register);

/*function WOWRec_init() {
	register_sidebar_widget(__('WOWRec'), 'widget_WOWRec');
}
	
add_action("plugins_loaded","WOWRec_init");
*/
?>