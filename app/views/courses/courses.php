<html>
  <head>

    
    <link href="../../../public/assets/themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
	<link href="../../../public/assets/scripts/jtable/themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" />
	
	<script src="../../../public/assets/scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="../../../public/assets/scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="../../../public/assets/scripts/jtable/jquery.jtable.js" type="text/javascript"></script>
	
  </head>
  <body>
  	<h3>Table1</h3>
	<div id="PeopleTableContainer" style="width: 600px;"></div>
	<script type="text/javascript">

		$(document).ready(function () {

		    //Prepare jTable
			$('#PeopleTableContainer').jtable({
				title: 'Courses Table',
				actions: {
					listAction: 'CourseAction.php?action=list',
					createAction: 'CourseAction.php?action=create',
					updateAction: 'CourseAction.php?action=update',
					deleteAction: 'CourseAction.php?action=delete'
				},
				fields: {
					id: {
						key: true,
						create: false,
						edit: false,
						list: false
					},
					course_number: {
						title: 'Number',
						width: '20%',
						edit: false,
						list:true
					},
					course_name: {
						title: 'Name',
						width: '20%'
					},
					professor:{
						title: 'Professor',
						width: 	'20%'
					},
					book:{
						title: 'Book',
						width: 	'20%',
						create: false,
					},
					created_at: {
						title: 'Record date',
						width: '10%',
						type: 'date',
						create: false,
						edit: false,
						list: false
					},
					updated_at: {
						title: 'Record date',
						width: '10%',
						type: 'date',
						create: false,
						edit: false,
						list: false
					}
				}
			});

			//Load person list from server
			$('#PeopleTableContainer').jtable('load');

		});

	</script>
 
  </body>
</html>
