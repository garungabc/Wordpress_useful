# wpcustomize
CUSTOMIZE

Description:
Create simple Customize for wordpress

Parameters:
<hr>
<pre>
$fields
	- setting_id: 
		(string) + (required): A unique slug-like ID for Customize setting
	- section_id: 
		(<span style="color: #52A6E7">string</span>) + (<span style="color: red;">required</span>): A unique slug-like ID for Customize section
	- control_id: 
		(<span style="color: #52A6E7">string</span>) + (<span style="color: red;">required</span>): A unique slug-like ID for Customize control
	- title_section: 
		(<span style="color: #52A6E7">string</span>) + (option): Name display for section, default is "Mặc định"
	- label_control: 
		(<span style="color: #52A6E7">string</span>) + (option): Name display for control, default is "Mặc định"
	- type: (<span style="color: #52A6E7">string</span>) + (option): Type of input, default is "text"
	- priority (option): 
		(<span style="color: #52A6E7">integer</span>) : Type of input, default is "30"
	- default: 
		(<span style="color: #52A6E7">string</span>)  (option): value default of input, default is empty
	- transport: 
		(<span style="color: #52A6E7">string</span>) + (option): value default of input, default is "postMessage"

</pre>
