@extends('layouts.bookcheetah')

{{-- Web site Title --}}
@section('title')
@parent
:: Account Login
@stop



@section('assets')
<!-- add your css and js here, dont add the jquery library again -->

    <link rel="stylesheet" href="{{ asset('assets/styles/css/account-account.css')}} ">
    <link rel="stylesheet" href="{{ asset('assets/styles/css/stylesheet.css')}} ">

    <!-- bxSlider Javascript file -->
    <script src="assets/bxslider/jquery.bxslider.js"></script>
    <!-- bxSlider CSS file -->
    <link href="assets/bxslider/jquery.bxslider.css" rel="stylesheet" />

    <!-- JTable CSS and JS -->
    <link rel="stylesheet" href="{{ asset('assets/themes/redmond/jquery-ui-1.8.16.custom.css')}} ">
    <link rel="stylesheet" href="{{ asset('assets/scripts/jtable/themes/lightcolor/blue/jtable.css')}} ">

    <script src="assets/scripts/jquery-1.6.4.min.js"></script>
    <script src="assets/scripts/jquery-ui-1.8.16.custom.min.js"></script>
    <script src="assets/scripts/jtable/jquery.jtable.js"></script>

    <script type="text/javascript" charset="utf-8">
        window.onload = initStyle;
        window.unload = initStyle;
            
        function initStyle() {
        //$(document).ready(function(){

            $('#bxslider').bxSlider({
              auto: true,
              autoControls: false,
              mode: 'fade',
              nextSelector: '#slider-next',
              prevSelector: '#slider-prev',
              adaptiveHeight: true,
              infiniteLoop: true,
              onSlideAfter: function(){
                $('#bx-pager a').children().css('color', '#74662A');
                $('#bx-pager a.active').children().css('color', '#FFD100');
              },
              pagerCustom: '#bx-pager'
            });

            $('#bxslider2').bxSlider({
              auto: true,
              autoControls: true,
              adaptiveHeight: true,
              infiniteLoop: true,
              onSliderLoad: function(){
                 $('.bxslider2 .bx-viewport').css('position', 'absolute');
                 $('.bxslider2 .bx-next').css('left', '14%');
                 $('.bxslider2 .bx-next').css('top','60px');
                 $('.bxslider2 .bx-prev').css('top','60px');
               },
              onSlideAfter: function(){
                $('#bx-pager2 li a').css('color', '#74662A');
                $('#bx-pager2 li').css('color', '#74662A');
                $('#bx-pager2 li a.active').css('color', '#FFD100');
                $('#bx-pager2 li a.active').parent().css('color', '#FFD100');
                $('#bx-pager2 li span').css('display', 'none');
                $('#bx-pager2 a.active').parent('li').children('span').css('display', 'list-item');
              },
              pagerCustom: '#bx-pager2'
            });
            
        };


   
    </script>

    <link href="../../../public/assets/themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
    <link href="../../../public/assets/scripts/jtable/themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" />
    
    <script src="../../../public/assets/scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="../../../public/assets/scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="../../../public/assets/scripts/jtable/jquery.jtable.js" type="text/javascript"></script>

<!-- Added New 
 <link href="{{ asset('../../../public/assets/themes/redmond/jquery-ui-1.8.16.custom.css') }}" rel="stylesheet" type="text/css" />
 <link href="{{ asset('../../../public/assets/scripts/jtable/themes/lightcolor/blue/jtable.css') }}" rel="stylesheet" type="text/css" />
    
 <script src="{{ asset('../../../public/assets/scripts/jquery-1.6.4.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('../../../public/assets/scripts/jquery-ui-1.8.16.custom.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('../../../public/assets/scripts/jtable/jquery.jtable.js') }}" type="text/javascript"></script>
-->


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
                        width: '20%'                                  
                    },
                    course_name: {
                        title: 'Name',
                        width: '20%'
                    },
                    fall_semester:{
                        title: 'Fall Semester',
                        width: '20%',
                        list: false
                    },
                    spring_semester:{
                        title: 'Spring Semester',
                        width: '20%',
                        list: false
                    },
                    professor:{
                        title: 'Professor',
                        width:  '20%',
                        
                    },
                    book:{
                        title: 'Book',
                        width:  '20%',
                        create: false
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
@stop



@section('content')
    
    <!-- <div class="content"> -->
            <!-- <div id="search_space">Search</div> -->
            <div class="left_side">
                <ul class="left_content">
                    
                    <a href="#"><li class="left-link">Profile</li></a><br /><br />
                    <a href="#"><li class="left-link">My Bookshelf</li></a><br />
                    <a href="#"><li class="left-link">My Wishlist </li></a><br />
                    <a href="#"><li class="left-link">Get Cash Now</li></a><br />
                    <a href="#"><li class="left-link">Cheetah delivery</li></a><br />
                    <!-- <a href="#"><li class="left-link">Support</li></a> -->
                    
                </ul>
            
            </div>


            <div class="center_content">
                <div class="user_title_space"><div class="title_text">User Details</div></div>
                <div class="user_photo_space" style="background-color:white; float:left;">
                 
                 <div>Image</div>
                 <a href="#"><div><input class="btn btn-primary submitbook" type="submit" value="Add Photo" style="font-size: 15px; float:left;"></div></a>
                </div>
                
                <div class="user_details_space">

                    <div class="black">
                        <td><div class="word">Name :</div> <div class="word">{{ Auth::user()->fullName() }}</div></td>
                    </div>
                    <div class="black">
                        <td><div class="word">Email :</div> <div class="word">{{ Auth::user()->email() }}</div></td>
                    </div>
                    <div class="black">
                        <td><div class="word">Phone :</div> <div class="word">{{ Auth::user()->phone() }}</div></td>
                    </div>
                    <div class="black">
                        <td><div class="word">College :</div> <div class="word">{{ Auth::user()->collegeName() }}</div></td>
                    </div>
                    <!-- <td><div class="word">Name :</div> <div class="word">{{ Auth::user()->fullName() }}</div></td><br />
                    <td><div class="word">Email :</div> <div class="word">{{ Auth::user()->email() }}</div></td> <br />            
                    <td><div class="word">Phone :</div> <div class="word">{{ Auth::user()->phone() }}</div></td> <br />
                    <td><div class="word">College :</div> <div class="word">{{ Auth::user()->collegeName() }}</div></td> <br /> <br /> -->

                    <a href="/edituser"><div class="editbtn"><input class="btn btn-primary submitbook" type="submit" value="Edit User" style="font-size: 15px;"></div></a>
                    
                </div>


                <div class="user_title_space"><div class="title_text">Courses</div></div>
                <div class="course_table">

                   <div id="PeopleTableContainer" style="width: 100%; margin:2px 0 0 5px;"></div>
                    
                </div>
            </div>
            <div class="right_content">
                <div class="progress_bar_title">Account SetUp Progress</div>
                <div class="progress_bar">
                    <div class="bar"><div class="bar_color"></div></div>
                </div>
                <div class="popular_books_bar"><div class="title_text">Popular Books</div></div>
                <div class="popular_slider">

                    <div id="bottom">
                        <!-- <ul id="bxslider2">
                            <li><img src="assets/bxslider/images/img-1.jpg" title="1" /></li>
                            <li><img src="assets/bxslider/images/img-2.jpg" title="2" /></li>
                            <li><img src="assets/bxslider/images/img-3.jpg" title="3" /></li>
                            <li><img src="assets/bxslider/images/img-4.jpg" title="4" /></li>
                            <li><img src="assets/bxslider/images/img-5.jpg" title="4" /></li>
                        </ul> -->

                     </div>
                </div>
                <div class="popular_text"></div>
            </div>
        

     <!-- </div> -->
@stop


