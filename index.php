<?php
include 'lib/SausageHTTP.php';
if(isset($_POST["busca"])){
$busca = $_POST["busca"];
}
$client = new SausageHTTP\SausageHTTP\SausageHTTP();
$todos = new SausageHTTP\SausageHTTP\SausageHTTP();
$albums = new SausageHTTP\SausageHTTP\SausageHTTP();
if(isset($busca)){
	$client->setRequest([
        // trocar aqui
		"URL" => 'http://jsonplaceholder.typicode.com/posts', 
		"METHOD" => 'GET', 
		"OPTIONS" => array(
			'postId' => $busca
		) 
	]);

    $todos->setRequest([
        // trocar aqui
        "URL" => 'http://jsonplaceholder.typicode.com/todos', 
        "METHOD" => 'GET', 
        "OPTIONS" => array() 
    ]);

    $albums->setRequest([
        // trocar aqui
        "URL" => 'http://jsonplaceholder.typicode.com/albums', 
        "METHOD" => 'GET', 
        "OPTIONS" => array() 
    ]);

}else {
	$client->setRequest([
                // trocar aqui
		"URL" => 'http://jsonplaceholder.typicode.com/posts', 
		"METHOD" => 'GET', 
		"OPTIONS" => array() 
	]);

    $todos->setRequest([
    // trocar aqui
    "URL" => 'http://jsonplaceholder.typicode.com/todos', 
    "METHOD" => 'GET', 
    "OPTIONS" => array() 
]);
$albums->setRequest([
    // trocar aqui
    "URL" => 'http://jsonplaceholder.typicode.com/albums', 
    "METHOD" => 'GET', 
    "OPTIONS" => array() 
]);
}
 // Decoding response from JSON to array
 $result = json_decode($client->response, 1);	
 $todos_resultado = json_decode($todos->response, 1);	
 $albums_resultado = json_decode($albums->response, 1);	

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Resume - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- datatable -->
        <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none">Clara Lages</span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="assets/img/fot.jpeg" alt="" /></span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Postagem</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Album</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">To-dos</a></li>
                </ul>
            </div>
        </nav> 
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="about">
                <div class="resume-section-content">
                    <h1 class="mb-0">
                        Clara
                        <span class="text-primary">Lages</span>
                    </h1>
                    <div class="subheading mb-5">
                        (31) 98207-2521 ·
                        <a href="mailto:name@email.com">lagesclara124@gmail.com</a>
                    </div>
                    <p class="lead mb-5">Como técnica de informática, apaixonada por tecnologia, tenho                 como objetivo adquirir experiência na área. Sou comunicativa,                 proativa e trabalho bem em grupo. Sou capaz de acrescentar                     muito em uma equipe e me tornar uma profissional melhor
                        Como técnica de informática, apaixonada por tecnologia, tenho  como objetivo adquirir experiência na área. Sou comunicativa, proativa e trabalho bem em grupo. Sou capaz de acrescentar muito em uma equipe e me tornar uma profissional melhor</p>
                    <div class="social-icons">
                        <a class="social-icon" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="social-icon" href="#"><i class="fab fa-github"></i></a>
                        <a class="social-icon" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="social-icon" href="#"><i class="fab fa-facebook-f"></i></a>
                    </div>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Experience-->

            <section class="section" id="experience">
            <h2 style = "margin-left: 35px;">Postagens</h2>
            <div class="container">

            <table id="example" class="display" style="width:90%">
				<thead>
					<tr>
                        <!-- trocar aqui para o cabeçalho da table -->
						<th>User ID</th>
						<th>ID</th>
						<th>Title</th>
						<th>Body</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach($result as $valor){ ?>
						<tr>
                            <!-- trocar aqui para os dados OLHANDO NO SITE!!!! -->
							<td> <?php echo $valor["userId"];?> </td>
							<td> <?php echo $valor["id"];?> </td>
							<td> <?php echo $valor["title"];?> </td>
							<td> <?php echo $valor["body"];?> </td>
						</tr>
					<?php } ?>
				</tbody>
		</table>


        </section>
        </div>

            <hr class="m-0" />
            <!-- Education-->
            <section class="section" id="education">
            <h2 style = "margin-left: 35px;">Albums</h2>
            <div class="container">
            <table id="example2" class="display" style="width:90%">
				<thead>
					<tr>
                        <!-- trocar aqui para o cabeçalho da table -->
						<th>User ID</th>
						<th>ID</th>
						<th>Title</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($albums_resultado as $valor){ ?>
						<tr>
                            <!-- trocar aqui para os dados OLHANDO NO SITE!!!! -->
							<td> <?php echo $valor["userId"];?> </td>
							<td> <?php echo $valor["id"];?> </td>
							<td> <?php echo $valor["title"];?> </td>
						</tr>
					<?php } ?>
				</tbody>
           
		</table>
        </section>
        </div>

            <hr class="m-0" />
            <!-- Skills-->
            <section class="section" id="skills">
            <h2 style = "margin-left: 35px;">To-do</h2>
            <div class="container">
            <table id="example3" class="display" style="width:90%">
				<thead>
					<tr>
                        <!-- trocar aqui para o cabeçalho da table -->
						<th>User ID</th>
						<th>ID</th>
						<th>Title</th>
						<th>Completed</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($todos_resultado as $valor){ ?>
						<tr>
                            <!-- trocar aqui para os dados OLHANDO NO SITE!!!! -->
							<td> <?php echo $valor["userId"];?> </td>
							<td> <?php echo $valor["id"];?> </td>
							<td> <?php echo $valor["title"];?> </td>
							<td> <?php echo $valor["completed"];?> </td>

						</tr>
					<?php } ?>
				</tbody>
		</table>
        </section>
        </div>
            <hr class="m-0" />
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    </body>
</html>
<script>
$(document).ready(function () {
    $('#example').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ dados por página",
            "zeroRecords": "Nada encontrado.",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Ops... Sem registros.",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
    });
    $('#example2').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ dados por página",
            "zeroRecords": "Nada encontrado.",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Ops... Sem registros.",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
    });
    $('#example3').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ dados por página",
            "zeroRecords": "Nada encontrado.",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Ops... Sem registros.",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
    });



});
  </script>