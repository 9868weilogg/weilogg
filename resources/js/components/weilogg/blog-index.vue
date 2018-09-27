
<template>
	<div>
		
		<h1 class="pageTitle">Blog<span>BLOG</span></h1>
		
		<div v-for="blog in blogs" :key="blog.id">
			<hr>
			

			<h3>{{blog.blog_title}}</h3>
			
			<p>{{blog.blog_post}}</p>
			
			<p>Date: {{blog.created_at}}</p>

		</div>
		
	</div>

</template>

<script>
	import axios from 'axios';
	
	export default{
		
	data() {
		return {
			blogs:[],
			new_title:'',
			new_post:'',
			update_title:'',
			update_post:'',
			showNew:false,
			showUpdate:false,
			loading:false,
		}
	},
			
	methods:{
		showBlog: function () {
	      axios.get("/api/blog")
		  .then((response) => {
		    console.log('get shoeBlog success');
		    this.blogs = response.data;
		  }
		  ,(error) => {
		  	console.log(error);
		  });
	    },
	    storePost: function(){
	    	axios.post("/api/blog",{
	    		new_title:this.new_title,
	    		new_post:this.new_post,
	    	})
	    	.then(function(response){
	    		console.log('storePost success');
	    		
	    	})
	    	.catch(function(error){
	    		console.log(error);
	    	});
	    	this.new_title ='';
	    	this.new_post ='';
	    	this.showBlog();
	    	this.showNew = false;
	    },
	    newPost: function(){
	    	if(this.showNew === true)
	    	{
	    		this.showNew = false;
	    	}
	    	else
	    	{
	    		this.showNew = true;
	    	}
	    },
	    updateBtn: function(id){
	    	axios.get("/api/blog/"+id)
			  .then((response) => {
			    console.log('show post success');
			    this.update_title = response.data.blog_title;
			    this.update_post = response.data.blog_post;
			    this.post_id = response.data.id;
	    		this.showUpdate= true;
			  }
			  ,(error) => {
			  	console.log(error);
			  });
	    },
	    updatePost: function(){
	    	axios.put("/api/blog/"+this.post_id,{
	    		update_title:this.update_title,
	    		update_post:this.update_post,
	    	})
	    	.then(function(response){
		    	console.log('updatePost success');
	    	})
	    	.catch(function(error){
	    		console.log(error);
	    	});
	    	this.update_title ='';
	    	this.update_post ='';
	    	this.showBlog();
	    	this.showUpdate = false;
	    },
	    deletePost: function(id){
	    	axios.delete("/api/blog/"+id)
	    	.then(function(response){
		    	console.log('updatePost success');
	    	})
	    	.catch(function(error){
	    		console.log(error);
	    	});
	    	this.showBlog();
	    },
	    modalId : function(id){
	    	return 'modal' + id;
	    }

	},

	created:function () {
	  axios.get("/api/blog")
	  .then((response) => {
	    console.log('get showBlog success');
	    this.blogs = response.data;
	  }
	  ,(error) => {
	  	console.log(error);
	  });
	}	

	

}
</script>

<style>
/* page title (about) style */

h1.pageTitle{
    border-bottom: 2px solid #DED5C7;
    position: relative;
    font-size: 80px;
    color:#DED5C7;
    margin-left:50px;
    width:210px;
    font-weight:normal;
}

h1.pageTitle span{
    position: absolute;
    font-size: 20px;
    color:#000;
    bottom: 40%;
    left:0;
}

</style>