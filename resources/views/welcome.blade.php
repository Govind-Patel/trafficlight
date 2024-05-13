<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>traffic light</title>
    <style>
    .circular {
      width: 100px; 
      height: 100px; 
      border-radius: 50%;
      background-color: red; 
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
    }
    .smallInput{
        width:95px;
        margin-top:10px;
    }
    .alphabet{
        margin-left:32px;
    }
  </style>
  </head>
  <body>
  <div class="container">
    <div class="row ">
        <div class="col-md-8 offset-md-2">
            <div class="row pt-4">
                <div class="col-md-3">
                    <h3 class="alphabet">A</h3>
                    <div class="circular"></div>
                    <input type="text" name="firstT" id="firstT" maxlength="1" class="smallInput form-control numeric">
                </div>
                <div class="col-md-3">
                    <h3 class="alphabet">B</h3>
                    <div class="circular"></div>
                    <input type="text" name="secondT" id="secondT" maxlength="1" class="smallInput form-control numeric">
                </div>
                <div class="col-md-3">  
                    <h3 class="alphabet">C</h3>
                    <div class="circular"></div>
                    <input type="text" name="thirdT" id="thirdT" maxlength="1" class="smallInput form-control numeric">
                </div>
                <div class="col-md-3">
                    <h3 class="alphabet">D</h3>
                    <div class="circular"></div>
                    <input type="text" name="fourthT" id="fourthT" maxlength="1" class="smallInput form-control numeric">
                </div>
            </div>
        
            <div class="form-group row pt-3">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Green light Intelvals</label>
                <div class="col-sm-3">
                <input type="text" class="form-control numericT" id="green">
                </div>
            </div>
            <div class="form-group row pt-3">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Yellow light Intelvals</label>
                <div class="col-sm-3">
                <input type="text" class="form-control numericT" id="yellow">
                </div>
            </div>

            <div class="pt-3">
                <button type="button" id="startT" class="btn btn-primary">Start</button>
                <button type="button"  id="stopT"  class="btn btn-danger">Stop</button>
            </div>

        </div>
    </div>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script>
        $('.numeric').keypress((e)=>{
            if( e.keyCode > 48 && e.keyCode <= 52) return true;
            else return false;
        })
        $('.numericT').keypress((e)=>{
            if( e.keyCode >= 48 && e.keyCode <= 57) return true;
            else return false;
        })

        $('.smallInput').on("change",function(e) {
            const vals = $('.smallInput').not(this).map(function() { return this.value }).get()
            const that = this;
            if (vals.indexOf(this.value) !=-1) {
                    alert('This number already exists')
                    that.value="";
                    setTimeout(function() { that.focus() },100)
                }  
        });

        $('#startT').on('click',function(){
            startT()
        })
      
        function getFirstPro(fisrtT, secondT, thirdT, fourthT,priorityNum){
            const numbers = [+fisrtT, +secondT, +thirdT, +fourthT];
            let tempArr = JSON.parse(JSON.stringify(numbers))
        
            const sortedArray = tempArr.slice().sort((a, b) => a - b);
            
            // console.log('smallestNumber',sortedArray[priorityNum]); // Output: 1
            const index = numbers.indexOf(sortedArray[priorityNum]);
            switch(index){
                case 0 : 
                    return 'firstT'
                    break;
                case 1 : 
                    return 'secondT'
                    break;
                case 2 : 
                    return 'thirdT'
                    break;
                case 3 : 
                    return 'fourthT'
                    break;
            }
        }
        var  cureentInteerValId = '';
        function startT(){
            let  cureentLight = '';
            let fisrtT = $('#firstT').val();
            let secondT = $('#secondT').val();
            let thirdT = $('#thirdT').val();
            let fourthT = $('#fourthT').val();
            let green = $('#green').val();
            let yellow = $('#yellow').val();
            if(fisrtT && secondT && thirdT && fourthT && green && yellow){
                $('#firstT').parent().find('.circular').css('background-color','red');
                $('#secondT').parent().find('.circular').css('background-color','red');
                $('#thirdT').parent().find('.circular').css('background-color','red');
                $('#fourthT').parent().find('.circular').css('background-color','red');
                // alert("success")
                cureentLight = getFirstPro(fisrtT, secondT, thirdT, fourthT,0)
                $('#'+cureentLight).parent().find('.circular').css('background-color','green');
                cureentInteerValId = setTimeout(() => {
                    $('#'+cureentLight).parent().find('.circular').css('background-color','yellow');
                    cureentInteerValId = setTimeout(() => {
                        $('#'+cureentLight).parent().find('.circular').css('background-color','red');
                        cureentLight = getFirstPro(fisrtT, secondT, thirdT, fourthT,1)
                        $('#'+cureentLight).parent().find('.circular').css('background-color','green');
                        cureentInteerValId = setTimeout(() => {
                            $('#'+cureentLight).parent().find('.circular').css('background-color','yellow');
                            cureentInteerValId = setTimeout(() => {
                                $('#'+cureentLight).parent().find('.circular').css('background-color','red');
                                cureentLight = getFirstPro(fisrtT, secondT, thirdT, fourthT,2)
                                $('#'+cureentLight).parent().find('.circular').css('background-color','green');
                                cureentInteerValId = setTimeout(() => {
                                    $('#'+cureentLight).parent().find('.circular').css('background-color','yellow');
                                    cureentInteerValId = setTimeout(() => {
                                        $('#'+cureentLight).parent().find('.circular').css('background-color','red');
                                        cureentLight = getFirstPro(fisrtT, secondT, thirdT, fourthT,3)
                                        $('#'+cureentLight).parent().find('.circular').css('background-color','green');
                                        cureentInteerValId = setTimeout(() => {
                                            $('#'+cureentLight).parent().find('.circular').css('background-color','yellow');
                                            cureentInteerValId = setTimeout(() => {
                                                $('#'+cureentLight).parent().find('.circular').css('background-color','red');
                                                startT()
                                            }, +yellow*1000);
                                        }, +green*1000);
                                    }, +yellow*1000);
                                }, +green*1000);
                            }, +yellow*1000);
                        }, +green*1000);
                    }, +yellow*1000);
                }, +green*1000);
            }
            else{
                alert("invalid input")
            }
        }
    $('#stopT').on('click',function(){
        return clearTimeout(cureentInteerValId);
    })
    

    </script>
  </body>
</html>