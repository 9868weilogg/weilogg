@extends('layouts.app')

@section('title')
Contact
@endsection

@section('page-css')
<style>
div#app{
    background-image: url('{{asset('image/weilogg/animal-avian-beak-1200857.jpg')}}');
    background-attachment: fixed;
    background-size:cover;
    background-position: left bottom;
}
/* page title (contact) style */

h1.pageTitle{
    border-bottom: 2px solid #DED5C7;
    position: relative;
    font-size: 80px;
    color:#DED5C7;
    margin-left:50px;
    width:280px;
}

h1.pageTitle span{
    position: absolute;
    font-size: 20px;
    color:#000;
    bottom: 40%;
    left:0;
    text-transform: uppercase;
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

p.topic{
    text-transform: uppercase;
    font-weight: bold;
}

p.topic span{
    font-weight: normal;
    text-transform: none;
}

input.btn{
    background-color:#937543;
    margin-left:0px;
}

</style>

@section('content')

<div class="row "><!-- justify-content-center -->
    
    <div class="col-md-8">
        <div class="pageTitle">
            <h1 class="pageTitle">Contact<span>Contact</span></h1>

        </div>
        <h1 class="topic">Get In Touch</h1>
        <p class="topic">Address: <span>Taman Bukit Belimbing, 43300 Seri Kembangan, Selangor.</span></p>
        <p class="topic">Phone: <span>017-8713513</span></p>
        <p class="topic">Email: <span>william.wlcheah@gmail.com</span></p>
        
    </div>
    <div class="col-md-4">
        
    </div>
    
</div>

@endsection
