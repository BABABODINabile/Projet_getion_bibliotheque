
    <style>
        body{
            background: #f7f7ff;
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid transparent;
            border-radius: .25rem;
            margin-bottom: 1.5rem;
            padding: 5px;
            box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        }
        .me-2 {
            margin-right: .5rem!important;
        }
        #acceuil{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding-top: 8%;
            padding-bottom: 8%;
        }
        .badge-soft-success {
    color: #63ad6f !important;
    background-color: rgba(99,173,111,.1);
}
    </style>
    <div id="acceuil" class="section">
             <?php
            session_start();
            $nom=$_SESSION['user_nom'];
            $prenom=$_SESSION['user_prenom'];
            $email= $_SESSION['user_email'] ;
            $role= $_SESSION['user_role'];
            $tel=$_SESSION['user_tel'];
        ?>
        <div class="container">
		<div class="main-body">
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="" width="110">
								<div class="mt-3">
									<h4><?php echo $nom, " ",$prenom;?></h4>
									<p class="text-secondary mb-1"><?php echo $role;?></p>
									<p class="text-muted font-size-sm"><?php echo $email?></p>
                                    <?php
                                        if ($_SESSION['logged_in'] = true) {
                                            echo '<span class="badge badge-soft-success mb-0">Connecté</span>';
                                        }
                                    ?>
									
								</div>
							</div>
						
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Nom</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<?php echo "<input type=\"text\" class=\"form-control\" value=\"",$nom,"\">";?>
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Prénom</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                    <?php echo "<input type=\"text\" class=\"form-control\" value=\"",$prenom,"\">";?>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<?php echo "<input type=\"email\" class=\"form-control\" value=\"",$email,"\">";?>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Téléphone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<?php echo "<input type=\"text\" class=\"form-control\" value=\"",$tel,"\">";?>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Fonction</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<?php echo "<input type=\"text\" class=\"form-control\" value=\"",$role,"\">";?>
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="button" class="btn btn-primary px-4" value="Sauvegarder les modifications">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    </div>