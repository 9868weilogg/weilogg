@extends('layouts.app')

@section('title')
About
@endsection



@section('page-css')
<style>
div#app{
    background-image: url('{{asset('image/weilogg/animal-avian-beak-326900.jpg')}}');
    background-attachment: fixed;
    background-size:cover;
    background-position: left top;
}


div.body{
    width:100%;
}

/* page title (about) style */

h1.pageTitle{
    border-bottom: 2px solid #DED5C7;
    position: relative;
    font-size: 80px;
    color:#DED5C7;
    margin-left:50px;
    width:210px;
}

h1.pageTitle span{
    position: absolute;
    font-size: 20px;
    color:#000;
    bottom: 40%;
    left:0;
}

/* page title (about) style */

/* topic heading style */

div.topic{
    padding: 0% 10%
}

h1.topic{
    border:1px solid #937543;
    padding: 1%;
    width:200px;
    border-radius: 100px;
    text-align: center;
    font-size:20px;
    background-color:#937543;
    text-transform: uppercase;
    font-weight: 400;
    margin:5% 0% 2% 10%;
    color:#E7EAED;
}

p.topic{
    text-transform: uppercase;
    font-weight: bold;
}

p.topic span{
    text-transform: none;
    font-weight:normal;
}

/* topic heading style */

/* skill level bar style */

div h4{
    font-weight: bold;
    font-size: 15px;
    margin-top:3%;
}

div#phpLaravel{
    width:100%;
    background-color: #c8c8c8;
}

div#phpLaravelLevel{
    width:75%;
    background-color: green;
    height:10px;
}

div#mysql{
    width:100%;
    background-color: #c8c8c8;
}

div#mysqlLevel{
    width:75%;
    background-color: green;
    height:10px;
}

div#htmlCss{
    width:100%;
    background-color: #c8c8c8;
}

div#htmlCssLevel{
    width:75%;
    background-color: green;
    height:10px;
}

div#git{
    width:100%;
    background-color: #c8c8c8;
}

div#gitLevel{
    width:50%;
    background-color: green;
    height:10px;
}

div#javascript{
    width:100%;
    background-color: #c8c8c8;
}

div#javascriptLevel{
    width:40%;
    background-color: green;
    height:10px;
}

div#cnc{
    width:100%;
    background-color: #c8c8c8;
}

div#cncLevel{
    width:40%;
    background-color: green;
    height:10px;
}

div#plc{
    width:100%;
    background-color: #c8c8c8;
}

div#plcLevel{
    width:40%;
    background-color: green;
    height:10px;
}

div#cad{
    width:100%;
    background-color: #c8c8c8;
}

div#cadLevel{
    width:80%;
    background-color: green;
    height:10px;
}

div#solidworks{
    width:100%;
    background-color: #c8c8c8;
}

div#solidworksLevel{
    width:60%;
    background-color: green;
    height:10px;
}

div#ajax{
    width:100%;
    background-color: #c8c8c8;
}

div#ajaxLevel{
    width:50%;
    background-color: green;
    height:10px;
}

/* skill level bar style */



/* The icon style */
i.fa-object-group, i.fa-globe{
  font-size: 100px;
  color:#937543;
}

h5.serviceGroup{
    font-weight: bold;
}   
/* The icon style */
</style>

@section('content')
<div class="body">
<div class="row">
    
    <div class="col-md-8">
        <div class="pageTitle">
            <h1 class="pageTitle">About<span>ABOUT</span></h1>

        </div>
        <div class="topic">
            <h1 class="topic">Personal Information</h1>
            <p class="topic">Name: <span>Cheah Wei Logg aka William</span></p>
            <p class="topic">Gender: <span>Male</span></p>
            <p class="topic">Age: <span id="myAge"></span></p>
            <p class="topic">Date of Birth: <span>30th December 1992</span></p>
            <p class="topic">Language: <span>Malay, English, Chinese, Cantonese, Hakka</span></p>
            <p class="topic">nationality: <span>Malaysia</span></p>
        </div>
        <div class="topic">
            <h1 class="topic">My Story</h1>
            <p>High tech always catch my eyes, this is one of the reason I choose to gain an engineering degree in university. The university's life is not as difficult as imagine, this is why I have the extra time to learn web programming by myself. I am impressed by the concept of automation, hence, I built Dishmotion website to automate the taking order process for my food delivery business. 
            The food delivery business idea is inspired by my coursemates who miss their parents' home-cooked food. After sometime, I stopped the business due to time constraint for me to prepare food, study and do the delivery. In the same time, I faced a difficulty of nobody to receive parcel for my online shopping. Therefore, I built gateready to offer srrvice to help customers to receive their parcel and then deliver to them at their available time. I tested this on university students in UPM and found that the online shopping behavior is not poular yet, so gateready's service is not relevant for them.
            I received an job offer from AD Consultants as Mechanical Engineer and started to work in the construction industry. Construction industry is a traditional industry that do not embrace the new technology due to high cost and contains a lot of waste. Therefore, I decided to leave and move on to work as an Industrial Engineer in Matrix-Ed Engineering. I choose to work in this manufacturing plant because it offers an opportunity for me to work on robotic programming and transform existing production line to automated one. I believe programming and automation will be the future. 
            After a year, I feel like exposing myself to more technology driven industry and focus more in programming. I decided to leave and seek for a job as a web developer. I am looking forward to challenge myself and be armoured in order to participate in the future world of programming. 
            </p>
        </div>
        <div class="topic">
            <h1 class="topic">My Skill</h1>
            
            <div><h4>PHP, Laravel</h4></div>
            <div id="phpLaravel"><div id="phpLaravelLevel"></div></div>
            <div><h4>MYSQL</h4></div>
            <div id="mysql"><div id="mysqlLevel"></div></div>
            <div><h4>HTML, CSS</h4></div>
            <div id="htmlCss"><div id="htmlCssLevel"></div></div>
            <div><h4>Git</h4></div>
            <div id="git"><div id="gitLevel"></div></div>
            <div><h4>Javascript</h4></div>
            <div id="javascript"><div id="javascriptLevel"></div></div>
            <div><h4>AJAX</h4></div>
            <div id="ajax"><div id="ajaxLevel"></div></div>
            <div><h4>CNC Programming</h4></div>
            <div id="cnc"><div id="cncLevel"></div></div>
            <div><h4>PLC</h4></div>
            <div id="plc"><div id="plcLevel"></div></div>
            <div><h4>AutoCAD</h4></div>
            <div id="cad"><div id="cadLevel"></div></div>
            <div><h4>Solidworks</h4></div>
            <div id="solidworks"><div id="solidworksLevel"></div></div>
        </div>
        <div class="topic">
            <h1 class="topic">My Service</h1>
            <div class="serviceGroup">
                
                <table class="table table-bordered text-center">
                    <tr><th><i class="fa fa-globe" aria-hidden="true"></i></th></tr>
                    <tr><td>
                        <h5 class="serviceGroup">Web Development</h5>
                        <p class="serviceGroup">Develop dynamic website based on requirement.</p>
                    </td></tr>
                </table>
            
                <table class="table table-bordered text-center">
                    <tr><th><i class="fa fa-object-group" aria-hidden="true"></i></th></tr>
                    <tr><td>
                        <h5 class="serviceGroup">Engineering Drafting</h5>
                        <p class="serviceGroup">Produce technical drawing in 2D or 3D as client's need.</p>
                    </td></tr>
                </table>
                
            </div>
        </div>
    </div>
    
    
</div>
</div>

@endsection
