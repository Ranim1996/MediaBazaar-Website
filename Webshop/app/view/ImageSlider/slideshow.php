<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Slideshow</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="./slideshow.css">
</head>
<body>
        <div class="container">
	
                <input type="radio" id="i1" name="images" checked />
                <input type="radio" id="i2" name="images" />
                <input type="radio" id="i3" name="images" />
                <input type="radio" id="i4" name="images" />
                <input type="radio" id="i5" name="images" />	
                
                <div class="slide_img" id="one">			
                        
                        <img src="./blank-business-composition-computer-373076.jpg">
                        
                            <label class="prev" for="i5"><span>&#x2039;</span></label>
                            <label class="next" for="i2"><span>&#x203a;</span></label>	
                    
                </div>
                
                <div class="slide_img" id="two">
                    
                        <img src="./books-business-computer-connection-459654.jpg" >
                        
                            <label class="prev" for="i1"><span>&#x2039;</span></label>
                            <label class="next" for="i3"><span>&#x203a;</span></label>
                    
                </div>
                        
                <div class="slide_img" id="three">
                        <img src="./iphone-notebook-pen-working-34578.jpg">	
                        
                            <label class="prev" for="i2"><span>&#x2039;</span></label>
                            <label class="next" for="i4"><span>&#x203a;</span></label>
                </div>
            
                <div class="slide_img" id="four">
                        <img src="./three-white-ceramic-pots-with-green-leaf-plants-near-open-796602.jpg">	
                        
                            <label class="prev" for="i3"><span>&#x2039;</span></label>
                            <label class="next" for="i5"><span>&#x203a;</span></label>
                </div>
            
                <div class="slide_img" id="five">
                        <img src="tyler-franta-iusJ25iYu1c-unsplash.jpg">	
                        
                            <label class="prev" for="i4"><span>&#x2039;</span></label>
                            <label class="next" for="i1"><span>&#x203a;</span></label>
            
                </div>
            
                <div id="nav_slide">
                    <label for="i1" class="dots" id="dot1"></label>
                    <label for="i2" class="dots" id="dot2"></label>
                    <label for="i3" class="dots" id="dot3"></label>
                    <label for="i4" class="dots" id="dot4"></label>
                    <label for="i5" class="dots" id="dot5"></label>
                </div>
                    
            </div>
            <script src="./slider.js"></script>
</body>
</html>