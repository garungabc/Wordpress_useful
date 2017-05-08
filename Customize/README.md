# wpcustomize
CUSTOMIZE

Description:
Create simple Customize for wordpress

Parameters:
<hr>
<pre>
$fields
	(<span style="color: #52A6E7">string</span>) setting_id (<span style="color: red;">required</span>): A unique slug-like ID for Customize setting
	(<span style="color: #52A6E7">string</span>) section_id (<span style="color: red;">required</span>): A unique slug-like ID for Customize section
	(<span style="color: #52A6E7">string</span>) control_id (<span style="color: red;">required</span>): A unique slug-like ID for Customize control
	(<span style="color: #52A6E7">string</span>) title_section (option): Name display for section, default is "Mặc định"
	(<span style="color: #52A6E7">string</span>) label_control (option): Name display for control, default is "Mặc định"
	(<span style="color: #52A6E7">string</span>) type (option): Type of input, default is "text"
	(<span style="color: #52A6E7">integer</span>) priority (option): Type of input, default is "30"

	(<span style="color: #52A6E7">string</span>) default (option): value default of input, default is empty
	(<span style="color: #52A6E7">string</span>) transport (option): value default of input, default is "postMessage"

</pre>
