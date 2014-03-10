<script type="text/javascript">
    //Parse.initialize("APPLICATION_ID", "JAVASCRIPT_KEY");
	Parse.initialize("5gXqQ4SHUCe3QiTxJ6uONB0eqTEFlfmHKa9JGP4P", "LLL7J8Zesibtex2QzImMm3i0iTDwJ2hRW98xNqzC");
	
	/*var user = new Parse.User();
	user.set("username", "wahidk");
	user.set("password", "wahid123");
	user.set("email", "wahid.k86@gmail.com");
	 
	user.signUp(null, {
	  success: function(user) {
		// Everything's done!
		alert(user.id);
		console.log(user.id);
	  },
	  error: function(user, error) {
		alert("Error: " + error.code + " " + error.message);
	  }
	});*/
  
	Parse.User.logIn("wahidk", "wahid123", {
	  success: function(user) {
		//alert(user.get("email"));
		console.log(user.get("email"));
	  },
	  error: function(user, error) {
	  	//alert("you shall not pass!");
		console.log("you shall not pass!");
	  }
	});
	
	
	var pageObj = Parse.Object.extend("Page");
	var query = new Parse.Query(pageObj);
	query.get("R0LatokDR8", {
	  success: function(pageData) {

		$.post('<?php echo site_url();?>/wp-content/plugins/Parse-Plugin/ajax.php', {act:'getPageDetail','pageData':JSON.stringify(pageData)},function(pageid){
			
			var PageNew = Parse.Object.extend("Page");
			var pageNewObj = new PageNew();
			pageNewObj.id = "R0LatokDR8";
			
			pageNewObj.set("WordpressId", pageid);
			
			// Save
			pageNewObj.save(null, {
			  success: function(response) {
				alert("A page has been created and the page id has been added to page object");
				alert(JSON.stringify(response));
			  },
			  error: function(pageNewObj, error) {
				alert('error while updating object');
			  }
			});
		}); 
		
		
		
		// The object was retrieved successfully.
	  },
	  error: function(object, error) {
	  	alert("error");
		// The object was not retrieved successfully.
		// error is a Parse.Error with an error code and description.
	  }
	});
  </script>
  <?php 
  echo plugins_url();
  ?>

