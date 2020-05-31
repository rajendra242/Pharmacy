<?php

class Cgs_Themes_Customizer_Image_Radio_Control extends WP_Customize_Control {

	public function render_content() {

		if ( empty( $this->choices ) ) {
			return;
		}

		$name = '_customize-radio-' . $this->id;

		?>
		<style>
			#cgs-fashion-trend-img-container .cgs-fashion-trend-radio-img-img {
				border: 3px solid #DEDEDE;
				margin: 0 5px 5px 0;
				cursor: pointer;
				border-radius: 3px;
				-moz-border-radius: 3px;
				-webkit-border-radius: 3px;
			}

			#cgs-fashion-trend-img-container .cgs-fashion-trend-radio-img-selected {
				border: 3px solid #AAA;
				border-radius: 3px;
				-moz-border-radius: 3px;
				-webkit-border-radius: 3px;
			}

			input[type=checkbox]:before {
				content: '';
				margin: -3px 0 0 -4px;
			}
		</style>
		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<ul class="controls" id='cgs-fashion-trend-img-container'>
			<?php
			foreach ( $this->choices as $value => $label ) :
				$class = ( $this->value() == $value ) ? 'cgs-fashion-trend-radio-img-selected cgs-fashion-trend-radio-img-img' : 'cgs-fashion-trend-radio-img-img';
				?>
				<li style="display: inline;">
					<label>
						<input <?php $this->link(); ?>style='display:none' type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link();
						checked( $this->value(), $value ); ?> />
						<img src='<?php echo esc_html( $label ); ?>' class='<?php echo esc_html($class); ?>' />
					</label>
				</li>
			<?php
			endforeach;
			?>
		</ul>
		<script type="text/javascript">
			jQuery( document ).ready( function ( $ ) {
				$( '.controls#cgs-fashion-trend-img-container li img' ).click( function () {
					$( '.controls#cgs-fashion-trend-img-container li' ).each( function () {
						$( this ).find( 'img' ).removeClass( 'cgs-fashion-trend-radio-img-selected' );
					} );
					$( this ).addClass( 'cgs-fashion-trend-radio-img-selected' );
				} );
			} );
		</script>
		<?php
	}
}
