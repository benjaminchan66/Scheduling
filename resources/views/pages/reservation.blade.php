<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>馬偕醫院排班系統</title>

  	<!--Import Google Icon Font-->
    <link type="text/css" rel="stylesheet" href="../css/icon.css" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../css/styles.css"/>
   	
   	<script src='../codebase/dhtmlxscheduler.js' type="text/javascript" charset="utf-8"></script>
	<script src='../codebase/ext/dhtmlxscheduler_timeline.js' type="text/javascript" charset="utf-8"></script>
	<script src='../codebase/ext/dhtmlxscheduler_container_autoresize.js' type="text/javascript" charset="utf-8"></script>
	<script src='../codebase/ext/dhtmlxscheduler_editors.js' type="text/javascript" charset="utf-8"></script>
	
	<link rel='stylesheet' type='text/css' href='../codebase/dhtmlxscheduler_flat.css'>
	
    <style>
        td{
            padding: 0;
        }
    </style>
</head>
<body>

	<nav id="slide-out" class="side-nav">
		<ul>
			<div class="logo-div">
				<a href="index.html" class="logo-a">
		    		<img src="../img/logo-mackay.png" class="logo-img">
		    		<font class="logo-p">馬偕醫院排班系統</font>
	   			</a>
	   		</div>
	   		<li class="divider"></li>
    	  	<li><a href="reservation.html" class="waves-effect"><i class="material-icons"><img class="side-nav-icon" src="../img/calendar-prearrange.svg"></i>預班表</a></li>
    	  	<li><a href="first-edition.html" class="waves-effect"><i class="material-icons"><img class="side-nav-icon" src="../img/calendar-first-edition.svg"></i>初版班表</a></li>
    	  	<li><a href="schedule.html" class="waves-effect"><i class="material-icons"><img class="side-nav-icon" src="../img/calendar-schedule.svg"></i>正式班表</a></li>
    	  	<li><a href="shift.html" class="waves-effect"><i class="material-icons"><img class="side-nav-icon" src="../img/calendar-exchange.svg"></i>調整班表</a></li>
    	  	<li><a href="doctor.html" class="waves-effect"><i class="material-icons"><img class="side-nav-icon" src="../img/doctor.svg"></i>醫師管理</a></li>
    	</ul>
	</nav>
    
	<header id="header" class="container-fix trans-left-five">
		<nav id="navbar" class="nav-extended">
	    	<div class="nav-wrapper blue-grey darken-1 logo-padding-left">
	    		<a onclick="sideNav()" class="blue-grey darken-1 waves-effect waves-light menu-btn">
	    			<i class="material-icons menu-icon" valign="middle">menu</i>
	    		</a>
			    <p class="brand-logo light">預班表</p>
			    <ul class="right">
			      	<li>
			      		<a class="dropdown-notification-button" href="#!" data-activates="dropdown-notification">
			      			<img src="../img/notifications-button.png" class="notifications-icon">
			      		</a>
			      	</li>
			      	<li>
			      		<a class="dropdown-button" href="#!" data-activates="dropdown1">張XX醫生<i class="material-icons right">arrow_drop_down</i>
			      		</a>
			      	</li>
			    </ul>
	    	</div>
	    	<div class="nav-content blue-grey darken-1">
                <ul class="tabs1 tabs-transparent">
                    <li class="tab1"><a href="reservation.html" class="tab-active">個人</a></li>
                    <li class="tab1"><a href="reservation-all.html">查看全部</a></li>
                </ul>
            </div>
	  	</nav>
		
		<ul id="dropdown-notification" class="dropdown-content">
            <li><font class="notification">5/12 李XX醫生換班成功<p>2 days ago</p></font></li>
            <li><font class="notification">5/11 系統公告 請去查閱<p>3 days ago</p></font></li>
        </ul>
        
	  	<ul id="dropdown1" class="dropdown-content">
		  	<li><a href="setting.html">設定</a></li>
		  	<li><a href="profile.html">個人資料</a></li>
		  	<li class="divider"></li>
		  	<li><a href="logout.html">登出</a></li>
		</ul>
        
        <a href="#" data-activates="slide-out" class="button-collapse"></a>
        
	</header>

	<div id="section" class="container-fix trans-left-five">
	    
		<div class="container-section2">
			<div class="row">
                <div id="self" class="col s12">
                    <div class="card">
                        <div class="card-action">
                            <font class="card-title">排班資訊</font>

                        </div>
                        <div class="divider"></div>
                        <div class="card-content">
                            
                            
                            <form action="#!" method="post">
                                <div class="row margin-b0">
                                    <div class="col s5">
                                        <p class="information">開放時間: 2017/06/01 - 2017/06/25</p>
                                        <p class="information">可排天班數: 白班:10 夜班:5</p>
                                        <p class="information">尚需排班數: 白班:5 夜班:1</p>    
                                    </div>
                                    <div class="col s7">
                                        <form class="col s6">
                                            <div class="input-field">
                                                <textarea id="textarea1" class="materialize-textarea" placeholder="請輸入XXXXX"></textarea>
<!--                                                     data-length="150"-->
                                                <label for="textarea1">備註:</label>
                                            </div>
                                            <button type="submit" class="waves-effect waves-light btn blue-grey darken-1 white-text right">提交</button>
                                        </form>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                    
                    <div class="card border-t">
                        <div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:1750px;'>
                            <div class="dhx_cal_navline">
                                <div class="dhx_cal_prev_button">&nbsp;</div>
                                <div class="dhx_cal_next_button">&nbsp;</div>
                                <div class="dhx_cal_today_button"></div>
                                <div class="dhx_cal_date"></div>
        
<!--                                <div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>-->
<!--                                <div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>-->
<!--                                <div class="dhx_cal_tab" name="timeline_tab" style="right:280px;"></div>-->
<!--                                <div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>-->
        
                            </div>
                            <div class="dhx_cal_header">
                            </div>
                            <div class="dhx_cal_data">
                            </div>		
                        </div>

                        <script type="text/javascript" charset="utf-8">
                    

                            scheduler.config.xml_date="%Y-%m-%d %H:%i";
                            // scheduler.config.dblclick_create = false;   //雙擊新增
//                            scheduler.config.readonly = true;   //唯讀，不能修改東西
//                            scheduler.config.drag_create = false;   //拖拉新增


                            
                            
                            var priorities = [
                                { key: 1, label: '行政' },
                                { key: 2, label: '教學' },
                                { key: 3, label: '台北白班' },
                                { key: 4, label: '台北夜班' },
                                { key: 5, label: '淡水白班' },
                                { key: 6, label: '淡水夜班' },
                                { key: 7, label: 'off班' }
                            ];
                            
                            scheduler.locale.labels.section_priority = 'Priority';
                            
                            //彈出視窗的選項
                            scheduler.config.lightbox.sections=[
//                                {name:"description", height:130, map_to:"text", type:"textarea" , focus:true},
//                                {name:"custom", height:23, type:"select", options:sections, map_to:"section_id" },
                                {name:"班別名稱", height:180, options:priorities, map_to:"priority", type:"radio", vertical:true},
//                                {name:"time", height:72, type:"time", map_to:"auto"}
                            ];
                            
                            //在Lightbox打開
                            scheduler.attachEvent("onBeforeLightbox", function (id){
                                var event = scheduler.getEvent(id);
                                
                                if (event.text == "New event"){
                                    event.text = "預班";
                                }
                                return true;
                            });
                            
                            //在Lightbox按下save時執行
                            scheduler.attachEvent("onEventSave",function(id,ev,is_new){
//                                var radio = scheduler.getEvent(id);
                                
                                return true;
                            })
                            
                            
                            //進入畫面後顯示的東西
                            scheduler.init('scheduler_here',new Date(2017,5,30),"month");
                            
                            //讀取資料
                            
                        	
                        	

                            scheduler.parse([
                            	@foreach($reservations as $reservation)
                                	{ start_date: "{{ $reservation->date}} 01:00", end_date: "{{ $reservation->date}} 01:00", text:"淡水", section_id:1},
                                @endforeach
                            ],"json");

                            
                        </script>
                        @foreach($reservations as $reservation)
                        	{{ $reservation->date}}
                        @endforeach
                    </div>
                </div>
                
      		</div>
		</div>
	</div>

	<script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
	<script type="text/javascript">
		var sideNav = (function() {
		  	var first = true;
		  	return function() {
		  	  	first ? slideToLeft() : slideToRight();
		  	  	first = !first;
		  	}
		})();
		
		function slideToLeft() {
		  	document.getElementById("slide-out").style.width = "0";
		    document.getElementById("header").style.marginLeft = "0";
		    document.getElementById("section").style.marginLeft = "0";
		};
		function slideToRight() {
			document.getElementById("slide-out").style.width = "250px";
		    document.getElementById("header").style.marginLeft = "250px";
		  	document.getElementById("section").style.marginLeft = "250px";
		};
        
//        查看side-nav現在是處於哪一頁
		$(".side-nav>ul>li").each(function() {
		    var navItem = $(this);
		    var href = window.location.href;
			var filename = href.replace(/^.*[\\\/]/, '')

		    if (navItem.find("a").attr("href") == filename) {
		      	navItem.addClass("active");
		    }
		});

		$(document).ready(function(){
  		  	// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
  		  	$('.modal').modal();
  		});
        
        $('.dropdown-notification-button').dropdown({
            inDuration: 300,
            outDuration: 225,
            constrainWidth: false, // Does not change width of dropdown to that of the activator
            hover: true, // Activate on hover
            gutter: 0, // Spacing from edge
            belowOrigin: true, // Displays dropdown below the button
            alignment: 'right', // Displays dropdown with edge aligned to the left of button
            stopPropagation: false // Stops event propagation
        });
        
    </script>

	 {{ csrf_field() }}
</body>
</html>
