@extends('layouts.app')

@section('title')
Resume
@endsection

@section('page-css')
<style>
div#app{
	background-image:url('{{asset('image/weilogg/abstract-art-decoration-1029624.jpg')}}');
	background-size:cover;
	background-position:center;
	background-repeat: no-repeat;
	background-attachment: fixed;
}

/* page title (resume) style */

h1.pageTitle{
    border-bottom: 2px solid #DED5C7;
    position: relative;
    font-size: 80px;
    color:#DED5C7;
    margin-left:50px;
    width:290px;
}

h1.pageTitle span{
    position: absolute;
    font-size: 20px;
    color:#000;
    bottom: 40%;
    left:0;
}

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

h1.date{
	border:1px solid #937543;
	padding: 1%;
	width:100px;
	border-radius: 100px;
	text-align: center;
	font-size: 14px;
	color:#c8c8c8;
	background-color: #937543;
}

div.content h2{
	font-size: 20px;
	font-weight: 400;
}

p.content {
	font-size: 14px;
	color:#6a6a6a;
	text-decoration: underline;
	font-weight: 300;
}

/* The actual content */
div.content {
    padding: 20px 30px;
    background-color: #DED5C7;
    position: relative;
    border-radius: 6px;
}





/* The actual timeline (the vertical ruler) */
.timeline {
    position: relative;
    max-width: 1200px;
    margin: 0 auto;
}

/* The actual timeline (the vertical ruler) */
.timeline::after {
    content: '';
    position: absolute;
    width: 6px;
    background-color: #6A6A6A;
    top: 0;
    bottom: 0;
    left: 50%;
    margin-left: -3px;
}
/* Container around content */
div.box{
	
	padding: 20px 20px;
    position: relative;
    width: 50%;
}

/* The circles on the timeline */
.box::after {
    content: '';
    position: absolute;
    width: 20px;
    height: 20px;
    right: -10px;
    background-color: #6A6A6A;
    border: 4px solid #EBEBF9;
    top: 30px;
    border-radius: 50%;
    z-index: 1;
}
/* Place the container to the left */
.left {
    left: 0;
}

/* Place the container to the right */
.right {
    left: 50%;
}



/* Fix the circle for containers on the right side */
.right::after {
    left: -10px;
}



/* mobile version */
@media screen and (max-width:600px){
	.timeline{
		margin-left:10px;
	}

	.right{
		left:0;
	}

	/* The actual timeline (the vertical ruler) */
	.timeline::after {
	    content: '';
	    position: absolute;
	    
	    top: 0;
	    bottom: 0;
	    left: 0;
	}

	/* Container around content */
	div.box{
		
	    width: 100%;
	}

	/* The circles on the timeline */
	.box::after {
	    content: '';
	    position: absolute;
	    
	    left: -10px;
	    
	    border-radius: 50%;
	    z-index: 1;
	}
}

</style>

@section('content')

<div class="row justify-content-center body">
	
    <div class="col-md-12">
    	<div class="pageTitle">
            <h1 class="pageTitle">Resume<span>RESUME</span></h1>

        </div>

	        <h1 class="topic">Experience</h1>
	        <div class="timeline">
	        	<div class="box left">
	        		<div class="content">
	        			<h1 class="date">Jun, 2018</h1>
	        			<h2>Industrial Engineer</h2>
	        			<p class="content">Matrix-ED Engineering Sdn Bhd</p>
	        			<ul>
	        				<li>Planning with production planner on the schedule of moving machines into new factory.</li>
	        				<li>Start relocate machines to new factory based on schedule.</li>
	        			</ul>
	        		</div>
	        	</div>
	        	<div class="box right">
	        		<div class="content">
	        			<h1 class="date">Feb, 2018</h1>
	        			<h2>Industrial Engineer</h2>
	        			<p class="content">Matrix-ED Engineering Sdn Bhd</p>
	        			<ul>
	        				<li>Study power requirement of every machine and produce a single diagram for electrician to construct the electrical system in new factory.</li>
	        				<li>Liaise with main contractor on the progress of new factory renovation.</li>
	        			</ul>
	        		</div>
	        	</div>
	        	<div class="box left">
	        		<div class="content">
	        			<h1 class="date">Nov, 2017</h1>
	        			<h2>Industrial Engineer</h2>
	        			<p class="content">Matrix-ED Engineering Sdn Bhd</p>
	        			<ul>
	        				<li>In charged of the Lean Transformation Program that initiate by COO.</li>
	        				<li>Conducted time study to reduce waste to achieve objectives of Lean Transformation Program.</li>
	        				<li>Design and continuously improve the production floor layout toward the concept lean manufacturing.</li>
	        			</ul>
	        		</div>
	        	</div>
	        	<div class="box right">
	        		<div class="content">
	        			<h1 class="date">Sep, 2017</h1>
	        			<h2>Industrial Engineer</h2>
	        			<p class="content">Matrix-ED Engineering Sdn Bhd</p>
	        			<ul>
	        				<li>Trained to operate Turin Robotic Manipulator.</li>
	        				<li>In charged of robotic welding department and produce welding program for new project.</li>
	        				<li>Modify welding program of existing project to reduce welding cycle time.</li>
	        			</ul>
	        		</div>
	        	</div>
	        	<div class="box left">
	        		<div class="content">
	        			<h1 class="date">Mar, 2017</h1>
	        			<h2>Mechanical Engineer</h2>
	        			<p class="content">AD Consultants (M) Sdn Bhd</p>
	        			<ul>
	        				<li>In charge in project (Putrajaya chilled water plant extension).</li>
	        				<li>Work full time at site to produce technical drawing and coordination work with contractors.</li>
	        			</ul>
	        			</ul>
	        		</div>
	        	</div>
	        	<div class="box right">
	        		<div class="content">
	        			<h1 class="date">Oct, 2016</h1>
	        			<h2>Mechanical Engineer</h2>
	        			<p class="content">AD Consultants (M) Sdn Bhd</p>
	        			<ul>
	        				<li>Design mechanical services (Fire Protection System, Cold Water and Sanitary Plumbing, Air Conditioning and Mechanical Ventilation System) for commercial shoplot development.</li>
	        				<li>Assist in technical drawing for project such as Putrajaya government building and Shah Alam factory.</li>
	        			</ul>
	        		</div>
	        	</div>
	        	<div class="box left">
	        		<div class="content">
	        			<h1 class="date">July, 2016</h1>
	        			<h2>Freelance Web Developer</h2>
	        			

	        			<p class="content">July, 2016 - Oct 2016 (gateready)</p>
	        			<ul>
	        				<li>Developed a website to receive parcel on behalf of UPM students and deliver to them when they are available.</li>
	        				<li>Online shopping behavior of UPM students is not popular and hence the website is discontinued.</li>
	        			</ul>

	        			<p class="content">Feb 2015 - Nov 2015 (dishmotion)</p>
	        			<ul>
	        				<li>Provide home-cooked soup with rice delivery in UPM.</li>
	        				<li>Developed a website to automate the taking order process from students in UPM.</li>
	        			</ul>
	        		</div>
	        	</div>
	        </div>
	    
        <h1 class="topic">Education</h1>
        <div class="timeline">
        	<div class="box left">
        		<div class="content">
        			<h1 class="date">June, 2016</h1>
        			<h2>Bachelor's Degree in Engineering (Mechanical)</h2>
        			<p class="content">Universiti Putra Malaysia (UPM)</p>
        		</div>
        	</div>
        	<div class="box right">
        		<div class="content">
        			<h1 class="date">Dec, 2011</h1>
        			<h2>STPM</h2>
        			<p class="content">SMK St John</p>
        		</div>
        	</div>
        	<div class="box left">
        		<div class="content">
        			<h1 class="date">Dec, 2009</h1>
        			<h2>SPM</h2>
        			<p class="content">SMK Seri Kembangan</p>
        		</div>
        	</div>
        </div>
    </div>
    
</div>

@endsection
