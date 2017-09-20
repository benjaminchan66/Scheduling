@extends("layouts.app2")

@section('head')
    <link type="text/css" rel="stylesheet" href="../css/nouislider.css" rel="stylesheet">
@endsection

@section('navbar')
    <p class="brand-logo light">設定</p>
@endsection

@section('content')
    <div id="section" class="container-fix trans-left-five">
		<div class="container-section">
			<div class="row">
                <div class="col s5">                 
                    <div class="card">
                        <!-- <form action="setDate" method="post"> -->
                            <div class="card-action">
                                <font class="card-title">預班時段</font>
                            </div>
                            <div class="divider"></div>
                            <div class="card-content">
                                <input type="hidden" id="startDate" name="startDate">
                                <input type="hidden" id="endDate" name="endDate">
                                <p class="slider-text">{{ $month }}月<font id="startFont"></font>日 
                                至 {{ $month }} 月<font id="endFont"></font>日</p>
                                <div id="slider"></div>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="modal-action waves-effect waves-light btn btn-save" 
                                onclick="setDate()">Save</button>
                            </div>
                            {{ csrf_field() }}
                        <!-- </form> -->
                    </div>
                </div>
      		  	<div class="col s5">                 
                    <div class="card">
                        <div class="card-action">
                            <font class="card-title">系統狀態</font>
                        </div>
                        <div class="divider"></div>
                        <div class="card-content center">
                            <h5 class="margin-t0">預班進行中</h5>
                            <p>系統將會關閉X小時</p>
                            <p>除排班人員外，所有醫生將不能進入系統</p>
                            <button type="button" class="btn btn-secondary margin-t10">產生初版班表</button>
                        </div>
                    </div>
                </div>
                
                <div class="col s5">                 
                    <div class="card">
                        <div class="card-action">
                            <font class="card-title">系統狀態</font>
                        </div>
                        <div class="divider"></div>
                        <div class="card-content center">
                            <h5 class="margin-t0">初版班表調整中</h5>
                            <p>排班人員可以調整初版班表</p>
                            <p>調整完成後按下按鈕公佈正式班表</p>
                            <button type="button" class="btn btn-secondary margin-t10" onclick="announceSchedule()">公佈正式班表</button>
                        </div>
                    </div>
                </div>
                
                <div class="col s5">                 
                    <div class="card">
                        <div class="card-action">
                            <font class="card-title">系統狀態</font>
                        </div>
                        <div class="divider"></div>
                        <div class="card-content center">
                            <h5 class="margin-t0">正式班表已公佈</h5>
                            <p>當預班時段到達時，請按下面按鈕開放預班</p>
                            <button type="button" class="btn btn-secondary margin-t10">開放下一次預班</button>
                        </div>
                    </div>
                </div>
				
      		</div>
		</div>
	</div>
@endsection

@section('script')
    <script src="../js/nouislider.js"></script>
    <script src="../js/wNumb.js"></script>
    <script>
        var slider = document.getElementById('slider');

        noUiSlider.create(slider, {
            start: [ 1, 20 ],
            step: 1,
            connect: true,
            range: {
                'min': 1,
                'max': 31
            }
        });
        
        var startDate = document.getElementById('startDate');
        var endDate = document.getElementById('endDate');
        var startFont = document.getElementById('startFont');
        var endFont = document.getElementById('endFont');

        slider.noUiSlider.on('update', function( values, handle ) {

            var value = values[handle];

            if ( handle ) {
                endDate.value = value;
                endFont.innerHTML = parseInt(value);
            } else {
                startDate.value = value;
                startFont.innerHTML = parseInt(value);
            }
        });

        function announceSchedule(){
            $.get('announceSchedule',{
                
            }, function(){
               alert("正式班表公布成功");

            });
            console.log("111");
        }

        function setDate(){
             $.get('setDate',{
                startDate:document.getElementById('startDate').value,
                endDate:document.getElementById('endDate').value
                
            }, function(){
                alert("時間修改成功");
                //change();

            });
        }
        function change(){
             $.get('getDate',{
                
            }, function(array){
                
                document.getElementById('startFont').innerHTML = array[0];
                document.getElementById('endFont').innerHTML = array[1];

                alert("時間修改成功");
            });
        }


        
//        startDate.addEventListener('change', function(){
//            slider.noUiSlider.set([this.value, null]);
//        });
//        
//        endDate.addEventListener('change', function(){
//            slider.noUiSlider.set([null, this.value]);
//        });
        
    </script>
@endsection
