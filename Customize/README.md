# wpcustomize
CUSTOMIZE

Description:
Create simple Customize for wordpress

Parameters:
<hr>
<pre>
$fields
	1. setting_id: 
		(string) + (required): A unique slug-like ID for Customize setting
	2. section_id: 
		(<span style="color: #52A6E7">string</span>) + (<span style="color: red;">required</span>): A unique slug-like ID for Customize section
	3. title_section: 
		(<span style="color: #52A6E7">string</span>) + (option): Name display for section, default is "Mặc định"
	4. label_setting: 
		(<span style="color: #52A6E7">string</span>) + (option): Name display for control, default is "Mặc định"
	5. type: (<span style="color: #52A6E7">string</span>) + (option): Type of input, default is "text"
	6. priority (option): 
		(<span style="color: #52A6E7">integer</span>) : Type of input, default is "30"
	7. default: 
		(<span style="color: #52A6E7">string</span>)  (option): value default of input, default is empty
	8. transport: 
		(<span style="color: #52A6E7">string</span>) + (option): value default of input, default is "postMessage"

</pre>
