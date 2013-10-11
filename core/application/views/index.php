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
            <a  href="<?php echo base_url() ?>" >
                <img src="assets/image/logo.png">
            </a>
        <nav>
            <ul>
                <li><a  href="<?php echo base_url() ?>" > HOME</a></li>
                <li>NOSOTROS</li>
                <li>CONTACTO</li>                
            </ul>
        </nav>
        </div>
    </header>
    
    <section class="search">    
        <div class="text_search">
            Busca la carrera en la cual participaste
        </div>
       

         <div class="content_more">        
            <div class = "form_seach">
                <form name="myform" action="index.php/carrera/show_race">
                    <input type="hidden" id="id_carrera" name="id_carrera" value="el id"/>
                    <input type="text" id="button_search" class="input_search">
                    <div class = "div_search">
                    <input type="submit" class="button_search" value="">
                </form>
            </div>
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
            <?php foreach ($carreras as $carrera) { 
                
                echo"   <div class='career'  id= 'tabCarrier'>";
                echo "    <div id='tabContainer' class='caja-sombra'> ";
                echo "        <div class='tabs'>";
                echo "            <div class='content_career '>";
                echo "                <div class='tabscontent'>";
                echo "                    <div class='tabpage tabpage1' id='tabpage_1'>";
                echo "                            <span>".$carrera['primer_lugar']['com_nombre']."</span><br>";
                echo "                         <span class='text_time'>NUMERO DE LA COMPETENCIA ".$carrera['primer_lugar']['com_numero']."</span> ";
                echo "                    </div>";
                echo "                  <div class='tabpage tabpage2' id='tabpage_2'>";
                echo "                     <div class='image_race'>";
                echo "                          <img class='image_race' src='upload/".$carrera['car_imagen']."'>";
                echo "                      </div>";
                echo "                    <span class='span_text_race'>".$carrera['car_nombre']."</span> <br>";
                echo "                    <span class='span_info_race'>".$carrera['car_nombre']." <span style='color:#e06217;'>PRUEBA: 10.4 KM</span><p>".$carrera['porcentaje_hombres']."% HOMBRES - ".$carrera['porcentaje_mujeres']."% MUJERES</span> <p>";                  
                echo "                </div>";
                echo "                <div class='tabpage' id='tabpage_3'>";
                echo "                     <div class='time_race'>";
                echo "                        <div class='name_firt_place'>";
                echo "                             <span class='name_race_span'>".$carrera['car_nombre']."</span><br>";
                echo "                            <span class='name_firt_place_span'>".$carrera['primer_lugar']['com_nombre']."</span>";
                echo "                         </div>";
                echo "                     </div>";
                echo "                    <div class='time_firt_place'>";
                echo "                        <span class='time_race_span'>".$carrera['primer_lugar']['com_tiempo_oficial']."</span><br>";
                echo "                        <span class='description_time_span'>TIEMPO OFICIAL</span>";
                echo "                    </div>";
                echo "                    <div class='time_chip'>";
                echo "                        <span class='time_race_span'>".$carrera['primer_lugar']['com_tiempo_tag']."</span><br>";
                echo "                        <span class='description_time_span'>TIEMPO CHIP</span>";
                echo "                    </div>";
                echo "                </div>";
                echo "            </div>";
                echo "       </div>";
                echo "        <ul>";
                echo "        <li id='tabHeader_1'>";
                echo "            <div class='button_career_first border_left'>";
                echo "                PRIMER LUGAR";
                echo "            </div>";
                echo "        </li>";
                echo "        <li id='tabHeader_2'>";
                echo "            <div class='button_career_description'>";
                echo "                 VER CARRERA";
                echo "            </div>";
                echo "        </li>";
                echo "        <li id='tabHeader_3'>";
                echo "           <div class='button_career_times border_right'>";
                echo "                TIEMPOS";
                echo "            </div>";
                echo "       </li>";
                echo "        </ul>";
                echo "     </div>";
                echo " </div>";
         }   ?>
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

S