


<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Kronotime</title>    
    <link rel="stylesheet" type="text/css" href="assets/styles//style.css">     
    <link rel="stylesheet" type="text/css" href="assets/styles/ui-lightness/jquery-ui-1.10.3.custom.css">     

    <script type="text/javascript" src="assets/js/jquery.js"></script>      
    <script type="text/javascript" src="assets/js/default.js"></script>  	
    <script type="text/javascript" src="assets/js/tab.js"></script>
	<script type="text/javascript" src="assets/js/common.js"></script>  	
	<script type="text/javascript" src="assets/js/jquery-ui.js"></script>  	
     
</head>

<body>

    <header>
        <div class="logo">
            <img src="assets/image/logo.png">
        <nav>
            <ul>
                <li>HOME</li>
                <li>NOSOTROS</li>
                <li>CONTACTO</li>
                <li>LOGIN</li>
            </ul>
        </nav>
        </div>
    </header>
    
    <section class="search">
    
        <div class="text_search">
            Busca la carrera en la cual participaste
        </div>
        <div class = "form_seach">

            <form name="myform" action="index.php/carrera/show_race">
                <input type="hidden" id="id_carrera" name="id_carrera" value="el id"/>
                <input type="text" id="button_search" class="input_search">
                <div class = "div_search">
                <input type="submit" class="button_search" value="">
            </form>
        </div>
        
    </section>

    <section class="twitters">
        <div class="twitt_text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vulputate ipsum sit amet felis fringilla rutrum. Donec vitae scelerisque metus. In hendrerit turpis vitae lorem vehicula facilisis
        </div>
        <div class="twitt_date">
            Enviado hace 3 dias, desde @kronotime
        </div>
    </section>
    <section class="content">   
        <div class ="content_carriers">
                <div class="career" id= "tabCarrier">
                  <div id="tabContainer">
                    <div class="tabs">
                        <div class="content_career">
                        <div class="tabscontent">
                        <div class="tabpage" id="tabpage_1">                            
                            <img src="assets/image/first-place.png">
                        </div>
                        <div class="tabpage" id="tabpage_2">
                            <img src="assets/image/resumen.png">
                        </div>
                        <div class="tabpage" id="tabpage_3">
                            <img src="assets/image/tiempos-carrera.png">
                        </div>
                    </div>              
                        </div>
                        <ul>                                                      
                            <li id="tabHeader_1">
                                <div class="button_career_first border_left">
                                    PRIMER LUGAR
                                </div>
                            </li>
                            <li id="tabHeader_2">
                                <div class="button_career_description">
                                    VER CARRERA
                                </div>
                            </li>
                            <li id="tabHeader_3">
                                <div class="button_career_times border_right">
                                    TIEMPOS 
                                </div>
                            </li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>

            </div>
        <div class="content_more">
            <button class="load_more">CARGAR MAS CARRERAS</button>
        </div>
    </section>    

    <footer  class="footer">
    <div class ="content_carriers">
        <div class="div_footer">
                <div class="square_fooder">
                </div>
                <div class ="fixed">                        
                        <span class="title">PURA VIDA</span><br>
                        <span class="text_footer">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non lectus sit amet arcu faucibus laoreet.</span><br>
                </div>

        </div>        
        <div class="div_footer">
            <input type="text" class="input_form name" placeholder="escriba su nombre completo">
            <input type="text" class="input_form email" placeholder="email">
            <input type="text" class="input_form telefono" placeholder="telefono">
          <input type="submit" id="guardar" value="">
        </div>        
    </div>
    </footer>
</body>





</html>

