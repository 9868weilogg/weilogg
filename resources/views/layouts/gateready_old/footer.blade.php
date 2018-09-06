<!-- footer.blade.php -->

<div class="container-fluid" id="footer">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row" >
        <div class="col-lg-5 col-lg-offset-2 col-md-5 col-md-offset-2 col-sm-6 col-sm-offset-1 col-xs-7 links" >
            <h3 class="links">Links</h3>
            <ul>
                <li><a href="{{url('/faq#q1')}}"  class="links" >About</a></li>
                <li><a href="{{url('/faq#q3')}}" class="links" >How It Works?</a></li>
                <li><a href="{{url('/faq#q8')}}"  class="links" >Pricing and Reward</a></li>
                <li><a href="{{url('/faq')}}"  class="links" >FAQ</a></li>
                <li><a href="{{url('/help')}}"  class="links" >Help</a></li>
                <li><a href="{{url('/tnc')}}"  class="links" >Term</a></li>
                <li><a href="{{url('/privacy')}}"  class="links" >Privacy</a></li>
            </ul>
            
            
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 social_media" >
            <h3 class="social_media">Social</h3>
            <div class="row">
                <div class="col-xs-6 social_media_i"><a href="https://www.facebook.com/GateReady-512343692305450/" target="_blank"><i class="fa fa-facebook-official"></i></a></div>
                <div class="col-xs-6 social_media_i"><a href="#" data-toggle="modal" data-target="#whatsappModal"><i class="fa fa-whatsapp"></i></a></div>
                <div class="col-xs-6 social_media_i"><a href="{{url('/help')}}" ><i class="fa fa-envelope-o"></i></a></div>
                <div class="col-xs-6 social_media_i"><a href="#" data-toggle="modal" data-target="#callModal"><i class="fa fa-phone-square"></i></a></div>
            </div>
        </div>
        
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row" align="center">
        <p id="copyright_year" align="center"></p>
        <a class="freepik" href="http://www.freepik.com/free-photo/man-smiling-with-a-lot-of-boxes_915972.htm">Designed by Freepik</a><br>
        
    </div>
</div>

<!-- whatsappModal -->

<div id="whatsappModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Whatsapp GateReady</h4>
            </div>
            <div class="modal-body" align="center">
                <h4 id="whatsapp_number">Whatsapp GateReady at <br>+60178713513<br> for more information or help.</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- callModal -->

<div id="callModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Call GateReady</h4>
            </div>
            <div class="modal-body" align="center">
                <h4 id="call_number">Call GateReady at <br>+60178713513<br> for more information or help.</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<style>
#footer {
    color:#ffc28c;
    clear: both;
    position: relative;
    z-index: 10;
    height: auto;
    margin-top: 30px;
    background-color: #272727;
    padding: 20px 20px;
}

.row{
    width: 100%;
}

h3.links , h3.social_media{
    padding-bottom: 20px;
}

ul{
    list-style: none;
    padding-left: 0;
}

li{
    padding-bottom: 10px;
}

li a.links{
    color: #c1c1c1;
    
}


div.social_media_i{
    margin: 0 0 20px 0;

}

div.social_media i{
    font-size: 30px;
    color: #c1c1c1;
    text-align: center;
    padding: 5px;
}

a.freepik{
    font-size: 10px;
    margin:5px auto 5px auto;
}

p#copyright_year{
    color:#c1c1c1;
    font-size: 14px;
}

h4#whatsapp_number,h4#call_number{
    color:#85654a;
    line-height: 20px;
    font-size: 14px;
    letter-spacing: 0.1em;
}
</style>

<script>
/**
*****  get today date   ******
*/
var d = new Date();

var month = d.getMonth();
var monthName = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
var day = d.getDate();

var year = d.getFullYear();
$(document).ready(function(){
    $('p#copyright_year').html(year + '&copy; GateReady.com');
});

</script>


