<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		*{
		   margin:0;
		   padding:0;
		   box-sizing:border-box;
		}
		
		html, body{
		   width:100%;
		   height:100%;
		   font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif ;
		   background-image: url('images/about_bg.jpg');
		   background-size: 100% 100%;
		}
		.container{
			width: 100%;
			height: 100%;
			display: flex;
			align-items: center;
			

		}
		.left_flip{
			margin-top: 10%;
			width: 30%;
			height: 60%;
			backdrop-filter: blur(5px) brightness(90%);
			box-shadow: 0.5px 5px 7px 0.5px rgb(75, 76, 77);
			transform-origin: right;
			transform:perspective(800px) rotateY(-90deg);
			transition: 2s;

			
			
		}
		.js_flip{
			transform:perspective(800px) rotateX(0deg) translateX(10%);
			transform-origin: right;
		}
		.right_content{
			margin-top: 10%;
			width: 45%;
			height: 60%;
			backdrop-filter: blur(5px) brightness(90%);
			box-shadow: 0.5px 5px 7px 0.5px rgb(75, 76, 77);
			transition: 2s;
			border-radius: 5px;
			
		}
		.right_content p{
			padding: 8px;
		}
		.right_content h3{
			padding-left: 8px;
			text-shadow: 0.5px 0.5px 1px white;
		}
	</style>
	<title>About</title>
</head>
<body>
	<div class="container">
		<div class="left_flip"></div>
		<div class="right_content">
			<h3>ABOUT WEBSITE</h3>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel est magni molestias recusandae fuga sit dicta beatae nemo exercitationem perspiciatis rem saepe, dolores deserunt consectetur nesciunt omnis illo nobis voluptates, cupiditate ab! Et, laudantium quisquam nulla possimus nesciunt dolorum quae eligendi fugit, eveniet excepturi repellat. Minus, architecto, perspiciatis neque reiciendis adipisci voluptas ipsam exercitationem saepe quis, quo libero possimus deleniti.</p><br>
			<h3>ABOUT ME</h3>
			<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea fuga hic dolor incidunt eveniet. Dolorem totam similique voluptates error mollitia placeat architecto? Tenetur eligendi pariatur officiis ullam, recusandae nesciunt vero.</p>
		</div>
	</div>

	<script>
		let content = document.querySelector('.right_content');
		let flip = document.querySelector('.left_flip');
		content.addEventListener('mouseenter', ()=>{
			flip.classList.add('js_flip');
			content.style.transform = `perspective(800px) translateX(${10}%)`;
			flip.style.borderRadius = `50%`;
			content.style.color = 'rgb(187, 234, 140)';
		})
		content.addEventListener('mouseleave', ()=>{
			flip.classList.remove('js_flip');
			flip.style.borderRadius = `0%`;
			content.style.transform = `translateX(-${10}%)`;
			content.style.color = 'black';

		})
	</script>
</body>
</html>