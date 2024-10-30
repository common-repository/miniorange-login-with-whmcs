<?php

function grant_type_settings() {
	?>
	</div>
	<div class="mo_table_layout" id="mo_grant_settings" style="position: relative;">
		<div style="padding:15px 0px 15px;"><h3 style="display: inline;">JWT Validation & PKCE&emsp;</h3><span style="float: right;">[
		<a href="https://developers.miniorange.com/docs/oauth/wordpress/client/json-web-token-support" target="_blank" rel="noopener">Click here</a> to know how this is useful. ]</span></div>
				<div>
					<table class="mo_settings_table">
						<tr>
							<td><strong>Enable JWT Verification:</strong></td>
							<td><input type="checkbox" value="" disabled/></td>
						</tr>
						<tr>
							<td><strong>JWT Signing Algorithm:</strong></td>
							<td><select disabled>
									<option>HSA</option>
									<option>RSA</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td><strong>PKCE (Proof Key for Code Exchange):</strong></td>
							<td><input id="pkce_flow" type="checkbox" name="pkce_flow" value="0" disabled/></td>
						</tr>
					</table>
					<p style="font-size:12px"><strong>*Note: </strong>PKCE can be used with Authorization Code Grant and users aren't required to provide a client_secret.</p>
				</div>
			<br><br>
		<div class="notes">
			<hr />
			Grant Type Settings and JWT Validation & PKCE are configurable in <a href="admin.php?page=mo_oauth_settings&tab=licensing" target="_blank" rel="noopener noreferrer">premium and enterprise</a> versions of the plugin.
		</div>
	</div>
	<div>
	<?php
}