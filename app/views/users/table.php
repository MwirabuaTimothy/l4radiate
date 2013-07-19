<html>
	<head>Jtable</head>
	<body>
		<!-- Added New -->
 <link href="{{ asset('assets/themes/redmond/jquery-ui-1.8.16.custom.css') }}" rel="stylesheet" type="text/css" />
 <link href="{{ asset('assets/scripts/jtable/themes/lightcolor/blue/jtable.css') }}" rel="stylesheet" type="text/css" />
    
 <script src="{{ asset('assets/scripts/jquery-1.6.4.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('assets/scripts/jquery-ui-1.8.16.custom.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('assets/scripts/jtable/jquery.jtable.js') }}" type="text/javascript"></script>

 <script type="text/javascript">

        $(document).ready(function () {

            //Prepare jTable
            $('#tablecontainer').jtable({
                title: 'Table of Courses',
                paging: true,
                pageSize: 2,
                sorting: true,
                defaultSorting: 'Name ASC',
                actions: {
                    listAction: 'tableaction.php?action=list',
                    createAction: 'tableaction.php?action=create',
                    updateAction: 'tableaction.php?action=update',
                    deleteAction: 'tableaction.php?action=delete'
                },
                fields: {
                    CourseId: {
                        key: true,
                        create: false,
                        edit: false,
                        list: false
                    },
                    CourseNo: {
                        title: 'Course Number',
                        width: '20%'
                    },
                    CourseName: {
                        title: 'Course Name',
                        width: '20%'
                    },

                    Book: {
                        title: 'Book',
                        width: '20%'
                    },
                    Professor: {
                        title: 'Professor',
                        width: '20%'
                    },
                    Author: {
                        title: 'Author',
                        width: '20%'
                    },
                    RecordDate: {
                        type: 'date',
                        create: false,
                        edit: false,
                        list: false
                    }
                }
            });

            //Load person list from server
            $('#tablecontainer').jtable('load');
            $('#tablecontainer').jtable('load');
        });

    </script>
	</body>
</html>