<?php
function DisplayUserList() {
	$siteusers = get_users( 
		//[ 'role__in' => [ 'administrator', 'subscriber' ] ] 
	);
	echo '<table class="wpbf-table wpbf-table-large wpbf-table-hover">';
	echo '<thead><tr><th>Display Name</th><th>Role</th><th>Email</th><th>ID</th></tr></thead>';
	foreach ( $siteusers as $user ) {
		echo '<tr>';
		echo '<td>' . esc_html( $user->display_name ) . '</td>';
		echo '<td>' . implode(', ', $user->roles) .'</td>';
		echo '<td>' . esc_html( $user->user_email ) . '</td>';
		echo '<td>' . esc_html( $user->ID ) .'</td>';
		echo '</tr>';
	}
	echo '</table>';
}