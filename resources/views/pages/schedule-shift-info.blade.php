@extends("layouts.app2")

@section('head')
    <style>
        td{
            padding: 0;
        }
    </style>
@endsection
    
@section('navbar')
    <p class="brand-logo light">換班資訊</p>
@endsection

@section('content')
    <div id="section" class="container-fix trans-left-five">    <!--	 style="background-color:red;"-->
		<div class="container-section">
		    <div class="row">
                <div class="col s12 m12">
                    <div class="card">
                        <div class="card-action">
      		  	  			<!-- <img src="../img/announcement.png" class="logo-img"> -->
      		  	  			<font class="card-title">換班資訊區</font>
      		  	  			<a class="btn-floating halfway-fab waves-effect waves-light red accent-2" href="#modal1"><i class="material-icons">add</i></a>
      		  	  			<!-- <a class="btn-floating halfway-fab waves-effect waves-light blue-grey darken-1"><i class="material-icons">add</i></a> -->
      		  	  		</div>
      		  	  		<div class="divider"></div>
      		  	  	  	
      		  	  	  	<div class="card-content padding-t5">
                            <table class="centered striped highlight scroll area1">
                                <thead>
                                    <tr>
                                        <th class="td-w-5">申請人</th>
                                        <th class="td-w-5">申請日期</th>
                                        <th class="td-w-20">內容</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($shiftRecords as $record)
                                    <tr>
                                        <td class="td-padding td-w-5">{{ $record[0] }}</td> <!--申請人-->
                                        <td class="td-padding td-w-5">{{ $record[6] }}</td>  <!--申請日期-->
                                        <td class="td-padding td-w-20">{{ $record[2] }}  <!--申請人想換班的日期-->
                                            <font class="font-w-b"> 
                                                {{ $record[0] }} <!--申請人的名字--> 
                                                {{ $record[4] }}<!--申請人換班名字--> 
                                            </font> 與 {{ $record[3] }} <!--被換班人的班日期-->
                                            <font class="font-w-b">
                                                {{ $record[1] }} <!--被換班人-->
                                                {{ $record[5] }}<!--被換班人的班名稱-->
                                            </font> 互換
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col s12 m12">
                    <div class="card">
                        <div class="card-action">
                            <!-- <img src="../img/announcement.png" class="logo-img"> -->
                            <font class="card-title">換班被拒</font>
                        </div>
                        <div class="divider"></div>
                        
                        <div class="card-content padding-t5">
                            <table class="centered striped highlight scroll area1">
                                <thead>
                                    <tr>
                                        <th class="td-w-5">申請人</th>
                                        <th class="td-w-5">申請日期</th>
                                        <th class="td-w-5">換班醫生</th>
                                        <th class="td-w-5">排班人員</th>
                                        <th class="td-w-20">內容</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($allRejectShiftData as $record)
                                    <tr>
                                        <td class="td-padding td-w-5">{{ $record[0] }}</td> <!--申請人-->
                                        <td class="td-padding td-w-5">{{ $record[6] }}</td>  <!--申請日期-->
                                        @if($record[8] == "已拒絕")
                                        <td class="td-padding td-w-5"><font class="red-text">{{ $record[8] }}<font></td>
                                        @else
                                        <td class="td-padding td-w-5">{{ $record[8] }}</td>
                                        @endif
                                        @if($record[9] == "已拒絕")
                                        <td class="td-padding td-w-5"><font class="red-text">{{ $record[9] }}<font></td>
                                        @elseif($record[9] == "未確認")
                                        <td class="td-padding td-w-5"><font class="red-text">{{ $record[9] }}<font></td>
                                        @else
                                        <td class="td-padding td-w-5">{{ $record[9] }}</td>
                                        @endif
                                        <td class="td-padding td-w-20">{{ $record[2] }}  <!--申請人想換班的日期-->
                                            <font class="font-w-b"> 
                                                {{ $record[0] }} <!--申請人的名字--> 
                                                {{ $record[4] }}<!--申請人換班名字--> 
                                            </font> 與 {{ $record[3] }} <!--被換班人的班日期-->
                                            <font class="font-w-b">
                                                {{ $record[1] }} <!--被換班人-->
                                                {{ $record[5] }}<!--被換班人的班名稱-->
                                            </font> 互換
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        
			<div class="row">
                <div class="col s12 m12">
      		  	  	<div class="card">
                        <div class="card-action">
      		  	  			<font class="card-title">換班待確認</font>
      		  	  		</div>
      		  	  		<div class="divider"></div>
      		  	  	  	
      		  	  	  	<div class="card-content padding-t5">
                            <table class="centered striped highlight scroll area2">
                                <thead>
                                    <tr>
                                        <th class="td-w-5">申請人</th>
                                        <th class="td-w-5">申請日期</th>
                                        <th class="td-w-25">內容</th>
                                        <th class="td-w-13">功能</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($shiftDataByDoctorID as $record)
                                    <tr>
                                        <td class="td-padding td-w-5">{{ $record[0] }}</td>
                                        <td class="td-padding td-w-5">{{ $record[6] }}</td>
                                        <td class="td-padding td-w-25">{{ $record[2] }} 
                                            <font class="font-w-b">
                                                {{ $record[0] }} {{ $record[4] }}
                                            </font> 與 {{ $record[3] }} 
                                            <font class="font-w-b">
                                                {{ $record[1] }} {{ $record[5] }}
                                            </font> 互換</td>
                                        <td class="td-padding td-w-13">
                                            <a class="waves-effect waves-light btn" name=confirm onclick="checkStatus({{$record[7]}},{{ $record[2] }},{{ $record[3] }})">允許</a>
                                            <a href="rejectShift/{{$record[7]}}" class="waves-effect waves-light btn deep-orange darken-3" name=reject>拒絕</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
      		</div>

            <div class="row">
                <div class="col s12 m12">
                    <div class="card">
                        <div class="card-action card1">
                            <div class="title1">
                                <font class="card-title">備註</font>
                            </div>
                            <div class="right">
                                時間：
                                <div class="input-field inline">
                                    <select id=month onchange="changeMonth()">
                                        <option value="" disabled selected>請選擇月份</option>
                                        <option value="{{ $currentMonth }}">{{ $currentMonth }}</option>
                                        <option value="{{ $preMonth }}">{{ $preMonth }}</option>
                                        <option value="{{ $beforePreMonth }}">{{ $beforePreMonth }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                        <div class="divider"></div>
                        <div class="card-content padding-t5">
                            <table class="centered striped scroll area3">
                                <thead>
                                    <tr>
                                        <th class="td-w-5">申請人</th>
                                        <th class="td-w-5">申請日期</th>
                                        <th class="td-w-20">內容</th>
                                    </tr>
                                </thead>
                                   

                               <tbody>
                                 @foreach($remarks as $remark)
                                    <tr>
                                        <td class="td-padding td-w-5" id=author>{{ $remark['author'] }}</td>
                                        <td class="td-padding td-w-5" id=date>{{ $remark['date'] }}</td>
                                        <td class="td-padding td-w-20" id=content>{{ $remark['content'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
      		
      		
            <div id="modal1" class="modal modal-fixed-footer modal-shift">
                <form action="schedule-shift-info" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-announcement-title">換班申請</h5>
                    </div>
                    <div class="modal-content modal-content-customize1">
                        <div class="row margin-b0">
                            <div class="col s12 center padding-b10">
                                <img src="../img/exchange.svg" style="height: 220px;width: 220px;">
                            </div>
                            
                            <div class="col s6">
                               <label>醫生:</label>
                                <select name= 'schID_1_doctor' class="browser-default" required>
                                    <option value="{{$currentDoctor->doctorID}}" selected>{{$currentDoctor->name}}</option>
                                </select>
                            </div>

                            <div class="col s6">
                                <label>醫生:</label>
                                <select name= 'schID_2_doctor' class="browser-default" id="doctorName" onchange="changeDoctor()" required>
                                    <option value="" disabled selected>請選擇醫生</option> 
                                    @foreach($doctorName as $name)
                                    <option value="{{$name->doctorID}}">{{$name->name}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="col s6">
                                <label>日期:</label>
                                <select name="scheduleID_1" class="browser-default" required>
                                    <option value="" disabled selected>請選擇日期</option>
                                    @foreach($currentDoctorSchedule as $data)
                                    <option value= '{{$data->scheduleID}}' >{{$data->date}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col s6">
                                <label>日期:</label>
                                <select  name='scheduleID_2' class="browser-default" id="date2" required>
                                    <option value="" disabled selected>請選擇日期</option>
                                    
                                </select>
                            </div>
                            
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="modal-action waves-effect blue-grey darken-1 waves-light btn-flat white-text btn-save">Save</button>
                        <button class="modal-action modal-close  waves-effect waves-light btn-flat btn-cancel">Cancel</button>
                        {{ csrf_field() }}
                    </div>
                </form>
            </div>
		</div>
	</div>
@endsection


@section('script')
    <script>
        $(document).ready(function(){
            $('select').material_select();
            $('.collapsible').collapsible();
  		});
    </script>
    
    <script>
        function changeDoctor() {
            $.get('changeDoctor', {
                id : document.getElementById('doctorName').value
            }, function(array) {
                changeDate(array);
            });
        }
    
        function changeDate(array) {
                var date = "";
                for(i=0 ; i<array.length ; i++){
                    date += "<option value="+array[i][0]+">"+array[i][2]+"</option>";
                    console.log('aaa'+array[i][0]);
                }
                document.getElementById("date2").innerHTML  = date;
        }

        function changeMonth() {
            $.get('changeMonth', {
                month : document.getElementById('month').value
            }, function(array) {

                var author = "";
                var date = "";
                var content ="";
                for(i=0 ; i<array.length ; i++){
                    author += "<td>"+array[i]['author']+"</td>";
                    date += "<td>"+array[i]['date']+"</td>";
                    content += "<td>"+array[i]['content']+"</td>";
                }

                document.getElementById("author").innerHTML  = author;
                document.getElementById("date").innerHTML  = date;
                document.getElementById("content").innerHTML  = content;
               
            });
        }

        function checkStatus(id,date1,date2) {
            $.get('getScheduleInfo', {
                id : id,
                date1 : date1,
                date2 : date2
            }, function(status) {
                if(status ==1){
                    checkShift(id);
                }
                else{
                    alert("此班表已變動，無法確認換班");
                }
               
            });
            
        }
        function checkShift(id) {
            $.get('checkShift', {
                id:id
            }, function() {
                location.reload();
            });

        }
    </script>
@endsection

