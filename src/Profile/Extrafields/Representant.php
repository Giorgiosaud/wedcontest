<?php 
namespace Zonapro\WedContest\Profile\Extrafields;
class Representant{

	public static function extra_profile_fields( $user ) { 
		$countries = \Zonapro\WedContest\HelperClasses\Countries::all();
		$referrals=\Zonapro\WedContest\HelperClasses\Referred::all();
		$selectedCountry=esc_attr( get_the_author_meta( 'country', $user->ID ) );
		$selectedReferral=esc_attr( get_the_author_meta( 'referral', $user->ID ) );
		?>

		<h3>Extra profile information for Representants</h3>

		<table class="form-table">

			<tr>
				<th><label for="country"><?php _e('Country') ?></label></th>

				<td>
					<?php
					show_select_field('country',
						true,
						'Select Your Country',
						$countries,
						$selectedCountry
					);
					?>
					<br /><span class="description"><?php _e('Please select your Country .','wedcontest')?></span>
				</td>
			</tr>
			<tr>
				<th><label for="country"><?php _e('Country') ?></label></th>

				<td>
					<?php
					show_select_field('referral',true,'How did you find out about the contest?',$referrals,$selectedReferral);
					?>
					
					<br /><span class="description"><?php _e('Please select your Referral way .','wedcontest')?></span>
				</td>
			</tr>
			<tr>
				<th><label for="phone"><?php _e('Phone number','wedcontest')?></label></th>

				<td>
					<input type="text" name="phone" id="phone" value="<?php echo esc_attr( get_the_author_meta( 'phone', $user->ID ) ); ?>" class="regular-text" /><br />
					<span class="description">Please enter your Phone Number.</span>
				</td>
			</tr>

		</table>
		<?php }
		public static function save_extra_user_profile_fields( $user_id ) {

			if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }

			update_user_meta( $user_id, 'country', $_POST['country'] );
			update_user_meta( $user_id, 'phone', $_POST['phone'] );
			update_user_meta( $user_id, 'referral', $_POST['referral'] );
		}

	}
