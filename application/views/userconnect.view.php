
<div class="container">
	<div class="row">
		<h2>Carousel with text and transition timer.</h2>
	</div>
    
    <div class="row">
        <!-- The carousel -->
        <div id="transition-timer-carousel" class="carousel slide transition-timer-carousel" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#transition-timer-carousel" data-slide-to="0" class="active"></li>
				<li data-target="#transition-timer-carousel" data-slide-to="1"></li>
				<li data-target="#transition-timer-carousel" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
                    <img src="http://placehold.it/1200x400" />
                    <div class="carousel-caption">
                        <h1 class="carousel-caption-header">Slide 1</h1>
                        <p class="carousel-caption-text hidden-sm hidden-xs">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dignissim aliquet rutrum. Praesent vitae ante in nisi condimentum egestas. Aliquam.
                        </p>
                    </div>
                </div>
                
                <div class="item">
                    <img src="http://placehold.it/1200x400/AAAAAA/888888" />
                    <div class="carousel-caption">
                        <h1 class="carousel-caption-header">Slide 2</h1>
                        <p class="carousel-caption-text hidden-sm hidden-xs">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dignissim aliquet rutrum. Praesent vitae ante in nisi condimentum egestas. Aliquam.
                        </p>
                    </div>
                </div>
                
                <div class="item">
                    <img src="http://placehold.it/1200x400/888888/555555" />
                    <div class="carousel-caption">
                        <h1 class="carousel-caption-header">Slide 3</h1>
                        <p class="carousel-caption-text hidden-sm hidden-xs">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dignissim aliquet rutrum. Praesent vitae ante in nisi condimentum egestas. Aliquam.
                        </p>
                    </div>
                </div>
            </div>

			<!-- Controls -->
			<a class="left carousel-control" href="#transition-timer-carousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#transition-timer-carousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
            
            <!-- Timer "progress bar" -->
            <hr class="transition-timer-carousel-progress-bar animate" />
		</div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-4">
            <div class="form-login">
            <h4>Bienvenue dans COORGEST</h4>
           <input type="text" id="userName" class="form-control input-sm chat-input" placeholder="entrer votre login" />
            <br/><br/>
            <input type="text" id="userPassword" class="form-control input-sm chat-input" placeholder="entrer le mot de passe" />
            </br><br/>
            <div class="wrapper">
            <span class="group-btn">     
                <a href="#" class="btn btn-primary btn-md"> Connexion</a>
                
                
            </span>
               <br/> <br/> 
                <a href="#" > mot de passe oublié?</a>
            </div>
            </div>
        
        </div>
    </div>
</div>