<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Notepad Manager</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/assets/css/notes.css">
	<script>
		$(document).ready(function(){
   			$(document).on("submit", "#mainForm", function(){
    		$.post( 
     			$('#mainForm').attr('action'),
      			$('#mainForm').serialize(),
      			function(output){
        			$('#note').append("<div class='note'>"+
        								"<form id='title_form' action='/notes/update_title/"+output.id+"' method='post'>"+	
        								 	"<textarea class='title' name='title'>"+output.title+"</textarea>"+
        								 "</form>"+
        								 "<a href='/notes/delete/"+output.id+"'>X</a>"+
        								 "<form id='desc_form' action='/notes/update_description/"+output.id+"' method='post'>"+
        								 	"<textarea class='description' name='description' placeholder='Enter a description'>"+output.description+"</textarea>"+
        								 "</form>"+
        								 "</div>");
      			}, "json"
   		 );
    	return false;
   });
		$(document).on("click", "a", function(){
			var parent = $(this).parent();
			$.post( 
 				$(this).attr('href'),
  				$(this).serialize(),
  				function(output){
    				parent.remove();
  				}, "json"
			);
		return false;
		});
		$(document).on("change", "#desc_form", function(){
			$.post( 
 				$(this).attr('action'),
  				$(this).serialize(),
  				function(output){
  				}, "json"
			);
		return false;
		});
		$(document).on("change", "#title_form", function(){
			$.post( 
 				$(this).attr('action'),
  				$(this).serialize(),
  				function(output){
  				}, "json"
			);
		return false;
		});
  });
	</script>
</head>
<body>
	<h1>Notepad Manager</h1>
	<div id="note">
<?php 	foreach($records as $record){?>
			<div class="note">
				<form id="title_form" action="/notes/update_title/<?=$record['id']?>" method="post">
					<textarea class="title" name="title"><?=$record['title']?></textarea>
				</form>
				<a id="delete" href="/notes/delete/<?=$record['id']?>">X</a>
				<form id="desc_form" action="/notes/update_description/<?=$record['id']?>" method="post">
					<textarea class="description" name="description" placeholder="Enter a description"><?=$record['description']?></textarea>
				</form>
			</div>
<?php	}?>
	</div>
	<form id="mainForm" action="/notes/create" method="post">
		<textarea name="title"></textarea>
		<button>Add Note</button>
	</form>
</body>
</html>