<?php

$brochure       = $_GET;

if(empty($brochure)){
    exit('no');
}

$total_pages  = count($brochure);
//$brochure_pages = ;
//var_dump($brochure);

?>        
<!-- BEGIN STRUCTURE HTML FLIPBOOK -->      
<div class="fb5" id="fb5">      
    
    <!-- BEGIN PRELOADER -->
    <div class="fb5-preloader"></div>
    <!-- END PRELOADER -->                      
  
	<!-- BEGIN CONTAINER BOOK -->
	<div id="fb5-container-book">
 
  	    <!-- BEGIN deep linking -->  
        <section id="fb5-deeplinking">
          <ul>
          <?php for ($i=1; $i < $total_pages; $i++) { 
             echo '<li data-address="page'.$i.'" data-page="'. $i .'"></li>';
          }?>
              
              
          </ul>
        </section>
        <!-- END deep linking -->  
    		
		<!-- BEGIN ABOUT -->
        <section id="fb5-about">
		</section>
		<!-- END ABOUT -->
        
        <!-- BEGIN PAGES -->
		<div id="fb5-book">   


                    <?php 
                    $p_count = 1;
                    foreach ($brochure as $pages ) { ?>
                       <!-- begin page <?php echo $p_count; ?> -->          
                    <div data-background-image="<?php echo $pages; ?>">          
                           
                                 <!-- container page book --> 
                                 <div class="fb5-cont-page-book">
                                 
                                        <!-- gradient for page -->
                                        <div class="fb5-gradient-page"></div>                
                                     
                                        <!-- PDF.js --> 
                                        <canvas id="canv1"></canvas>                                                               
                                       
                                        <!-- description for page --> 
                                        <div class="fb5-page-book">
                                                         
                                        </div> 
                                                  
                                 
                                  </div> <!-- end container page book --> 
                            
                      </div>
                     <!-- end page 1 -->   
                   <?php 
                   $p_count++;
                   } 
                   ?>                    
                                 
                    
          
		</div>
        <!-- END PAGES -->
        
	</div>
	<!-- END CONTAINER BOOK -->

	<!-- BEGIN FOOTER -->
	<div id="fb5-footer">
    
	    <div class="fb5-bcg-tools"></div>
        
        
         
		<a id="fb5-logo" target="_blank" href="#">
			
		</a>
		
		<div class="fb5-menu" id="fb5-center">
			<ul>
            
                <!-- icon_home -->
                <li>
					<a title="show home page" class="fb5-home"><i class="fa fa-home"></i></a>
				</li>
                                
                
                <!-- icon download -->
                <li>
					<a title="download pdf" class="fb5-download" href="<?php echo $list->file_path_to_pdf; ?>"><i class="fa fa-download"></i></a>
				</li>
                			
                        
                <!-- icon arrow left -->
                <li>
					<a title="prev page" class="fb5-arrow-left"><i class="fa fa-chevron-left"></i>
</a>
				</li>
                                
                
                  <!-- icon arrow right -->
                <li>
					<a title="next page" class="fb5-arrow-right"><i class="fa fa-chevron-right"></i>
</a>
				</li>
                                
                
                <!-- icon_zoom_in -->                     
            	<li>
					<a title="zoom in" class="fb5-zoom-in"><i class="fa fa-search-plus"></i></a>
				</li>
                                            
                           
                
                <!-- icon_zoom_out -->                 
				<li>
					<a title="zoom out" class="fb5-zoom-out"><i class="fa fa-search-minus"></i></a>
				</li>
                                
                
                 <!-- icon_zoom_auto -->
                <li>
					<a title="zoom auto" class="fb5-zoom-auto"><i class="fa fa-search"></i></a>
				</li>
                                
                           
                <!-- icon_allpages 
                <li>
					<a title="show all pages" class="fb5-show-all"><i class="fa fa-list"></i></a>
				</li>-->
                                                
                
                <!-- icon fullscreen -->                 
                <li>
					<a title="full/normal screen" class="fb5-fullscreen"><i class="fa fa-expand"></i></a>
				</li>
                                
              
				
			</ul>
		</div>
		
		<div class="fb5-menu" id="fb5-right">
			<ul>              
                <!-- icon page manager -->                 
				<li class="fb5-goto">
					<label for="fb5-page-number" id="fb5-label-page-number"></label>
					<input type="text" id="fb5-page-number" style="width: 25px;"> 
                    <span id="fb5-page-number-two"></span>
					
				</li>                
			</ul>
		</div>
        
        
	
	</div>
	<!-- END FOOTER -->
           
  
    <!-- BEGIN CLOSE LIGHTBOX  -->
    <div id="fb5-close-lightbox">
     <i class="fa fa-times pull-right"></i>
    </div>  
    <!-- END CLOSE LIGHTBOX -->


</div>
<!-- END STRUCTURE HTML FLIPBOOK -->









