<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Kronotime</title>    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/styles//style.css')?>">     
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/styles/ui-lightness/jquery-ui-1.10.3.custom.css')?>">     

    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js')?>"></script>          
    <script type="text/javascript" src="<?php echo base_url('assets/js/default.js')?>"></script>  	
    <script type="text/javascript" src="<?php echo base_url('assets/js/tab.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/common.js')?>"></script>  	
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.js')?>"></script>  	

</head>

<body>
 
    <header>
        <div class="logo">
            <a  href="<?php echo base_url() ?>" >
                <img src="../../assets/image/logo.png">
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
    <section class="div_tittle_race">
    
        <div class="tittle_race">
            <?php echo ucwords($objCarrera->car_nombre) ?>
        </div> 
         <div class="date_race">
           <?php  $date = new DateTime($objCarrera->car_fecha); echo $date->format('F-m-d');?>
        </div>                
    </section>

    <section class="race_info">
        <div class="div_race caja-sombra">
            <img src="../../upload/<?php echo  $objCarrera->car_imagen?>" class="image_carrera">
            <div class="social">
                <div class="twitter"></div>
                <div class="fb"></div>
                <div class="mail"></div>
            </div>
        </div>         
       
        <div class="div_race" style="margin-left : 24px;">
            <div class="name_competidor">         
            <?php echo $objCompetidor->com_nombre ?>            
            </div>            
            <div class="resumen_carrera caja-sombra">
                <div class="promedio_carrera">
                    <span> </span>
                </div>
                <div class="mejor_tiempo ">
                    <span>TIEMPO PISTOLA</span>
                </div>
                <div class="div_tiempo_pistola">
                    <span class="val_time"><?php echo $objCompetidor->com_tiempo_oficial ?> </span><br><br>
                     <span class="text_vs">VS</span><br><br>
                    <span id="tiempo_oficial_" class="text_vs_time"><?php echo $objPrimero->com_tiempo_oficial ?></span><br>
                    <span class="text_vs_person"><?php echo $objPrimero->com_nombre ?></span>
                </div>
            </div>
        </div>    

      <div class="div_race" style="margin-left : 24px;">      
             <input type="text" id="compare_user" class="input_search_user" placeholder="Eliga contra que competidor comparar">          
            <div class="resumen_carrera caja-sombra">
                <div class="promedio_carrera">
                    <span> </span>
                </div>
                <div class="mejor_tiempo">
                    <span>TIEMPO CHIP</span>
                </div>
                <div class="div_tiempo_pistola">                    
                    <span class="val_time"><?php echo $objCompetidor->com_tiempo_tag ?></span><br><br>
                    <span class="text_vs">VS</span><br><br>
                    <span id="tiempo_tag" class="text_vs_time"><?php echo $objPrimero->com_tiempo_tag ?></span><br>
                    <span  class="text_vs_person"><?php echo $objPrimero->com_nombre ?></span>
                </div>
            </div>
        </div>


    </section>
    <section class="content">
        <div class="content_more">        
            <div class = "form_seach">
                <form name="myform" action="index.php/carrera/show_race">    
                <input type="hidden" id="id_carrera" name="id_carrera" value="<?php echo  $objCarrera->cat_id?>">                
                    <input type="text" id="search_user" class="input_search" placeholder="Escriba el nombre de competidor">
                    <div class = "div_search">
                    <input type="submit" class="button_search" value="">
                </form>
            </div>
        </div>

        
        
    </section>
    <section class="user_list">
            <div class='div_user_vs vs_left caja-sombra'>
                <span>Tiempo</span><br><br>
                <span class="vs_usuario_nombre"> <?php echo $objCompetidor->com_nombre ?></span>
                <span class="vs_usuario_tiempo"><?php echo $objCompetidor->com_tiempo_oficial ?></span><br>
                <span class="vs_competidor_nombre"> <?php echo $objPrimero->com_nombre ?></span>
                <span id="tiempo_oficial" class="vs_competidor_tiempo"><?php echo $objPrimero->com_tiempo_oficial ?></span>      
            </div>
            <div class='div_user_vs vs_right caja-sombra'>
            
            <span>Posición</span><br><br>
                <span class="vs_usuario_nombre"> <?php echo $objCompetidor->com_nombre ?></span>
                <span class="vs_usuario_tiempo"><?php echo $objCompetidor->com_posicion ?></span><br>
                <span class="vs_competidor_nombre"> <?php echo $objPrimero->com_nombre ?></span>
                <span  id="posicion" class="vs_competidor_tiempo"><?php echo $objPrimero->com_posicion ?></span>      
            </div>
            <div class='div_user_vs vs_left caja-sombra'>
                <span>Posición General</span><br><br>
                <span class="vs_usuario_nombre"> <?php echo $objCompetidor->com_nombre ?></span>
                <span class="vs_usuario_tiempo"><?php echo $objCompetidor->com_posicion_general ?></span><br>
                <span class="vs_competidor_nombre"> <?php echo $objPrimero->com_nombre ?></span>
                <span id="posicion_general" class="vs_competidor_tiempo"><?php echo $objPrimero->com_posicion_general ?></span>      
            </div>
            <div class='div_user_vs vs_right caja-sombra'>
                 <span>Paso</span><br><br>
                <span class="vs_usuario_nombre"> <?php echo $objCompetidor->com_nombre ?></span>
                <span class="vs_usuario_tiempo"><?php echo $objCompetidor->com_paso ?></span><br>
                <span class="vs_competidor_nombre"> <?php echo $objPrimero->com_nombre ?></span>
                <span id="paso" class="vs_competidor_tiempo"><?php echo $objPrimero->com_paso ?></span>      
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