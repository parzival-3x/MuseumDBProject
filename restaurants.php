<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>MFAH</title>
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <header class="myheader">
        <div class="row">
            <a href="index.php">
                <button type="button">
                    <img src="/img/MFAHlogo.png" height="100" alt="logo">
                </button>
            </a>
        </div>
    </header>
    <body>
            <?php
                $servername = "34.30.147.150";
                $username = "root";
                $password = "Gocoogs15!";
                $dbname = "museum";
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }

                $sql = 'SELECT Restaurant_name, Hours_of_service FROM RESTURANTS';
                $result =  $conn->query($sql);
                $rest = $result->fetch_all(MYSQLI_ASSOC);
                if (count($rest) > 0)
                {
                    echo '<div class="tab">';
                    foreach ($rest as $rest)
                    {
                        echo '<button class="tablinks" onclick="openRestaurant(event,' .$rest["Restaurant_name"]. ')">' .$rname["Restaurant_name"]. '</button>';
                    }
                    echo '</div>';

                    echo '<div id=' .$rest[0]. 'class="tabcontent">
                            <h3>' .$rest[0]. '</h3>
                            <p>Service Hours:' .$rest[1]. '</p>
                            <h4>BREAKFAST</h4>
                            Pain Au Chocolate $4 <br>
                            Cornetto $4 <br>
                            Almonds Croissant $4

                            <h4>LUNCH & DAYTIME</h4>
                            <h5>SOUP & SALAD</h5>
                            <p>CHICKEN CAESAR SALAD $18 <br>
                            Chopped Romaine, Parmesan, Herb Ranch, Croutons</p>

                            <p>PANZANELLA SALAD $13 <br>
                            Grape Tomatoes, Cucumbers, Olives, Red Onions,Fresh Mozzarella, Basil, Oregano, Leonelli Vinaigrette</p>

                            <p>GRAPEFRUIT SALAD $13 <br>
                            Arcadian Mix, Grapefruit, Pomegranate, Red Onion, Mint, Candied Pecans, Moonlight Goat Cheese</p>

                            <p>BUTTERNUT SQUASH SOUP $8 <br>
                            Carrots, Onion, Cream, Salt and Pepper </p>

                            <h5>SANDWICHES</h5>
                            <p>ROASTED CHICKEN SALAD $15 <br>
                            Chicken Salad Romaine Lettuce, Tomato, Bacon </p>
                          
                            <p>MUSHROOM SANDWWICH $15 <br>
                            Lonestar Mushrooms, Braised Greens, Taleggio, Chili Crunch</p>

                            <p>PROSCIUTTO SANDWICH $15 <br>
                            Mozzarella, Arugula, EVOO</p>

                            <h5>FOCACCIA</h5>
                            <p>MARGHERITA Slice $7.50 <br>
                            Stracciatella, Roasted Tomato, Mozzarella, Basil</p>
                            
                            <p>RODEO BBQ PIZZA Slice $7.50 <br>
                            Smoked Mozzarella,Bacon,Roasted Jalapeno,Red Onion, Chicken, BBQ Sauce</p>
                            
                            <p>PEPPERONISlice $7.50 <br>
                            Mozzarella, Parmesan, Sicilian Oregano</p>
                            
                            <p>BIANCA slice $4 <br>
                            Focaccia, Rosmery, salt , EVO</p>
                            
                            <h5>HOT FOODS</h5>
                            <p>CHICKEN MARSALA $18 <br>
                            Breaded Chicken Breast, Lonestar Mushrooms, Marsala Wine Sauce</p>
                       
                            <p>DIJON HERB ROASTED SALMON $20 <br>
                            Dijon Mustard Sauce, Dill, Parsley, Basil, White Wine Sauce</p>

                            <p>BAKED ZITI & ITALIAN SAUSAGE $12 <br>
                            Basil, Italian Cheeses</p>

                            <p>ORZO PASTA $6 <br>
                            Semi Secco Tomatoes, Olive oil, Butter, Italian Herb Lemon, Parmesan</p>

                            <p>PARSNIP AND CARROTS MEDLEY $6 <br>
                            Brown Butter & Sage Sauce</p>

                            <h5>KIDS</h5>
                            <p>CHEESE PIZZA $4 </p>

                            <h4>DOLCI</h4>
                            <p>COOKIES <br>
                            CHOCOLATE CHUNK $4 <br>
                            SNICKERDOODLE $4 <br>
                            OATMEAL RAISIN $4</p>

                            <p>LEMON TART $4.75 <br>
                            lemon curd & meringue</p>
                            
                            <p>CHOCOLATE TART $4.75 <br>
                            chocolate ganache, caramel, fig</p>
                       
                            <p>LINZER TART $4.75 <br>
                            hazelnut frangipane, raspberry jam</p>
                            
                            <p>ÉCLAIRS $4
                            vanilla & black currant <br>
                            hazelnut & espresso <br>
                            raspberry <br>
                            tiramisu</p>

                            <h4>BEVERAGES</h4>
                            <h5>BUBBLES</h5>
                            <p>BRUT SPARKLING $11 <br>
                            Jaume Serra Cristalino Especial Rose\', Spain</p>                          

                            <h5>WHITE WINE</h5>
                            SAUVIGNON BLANC Glass $10 Bottle $40
                            Silver Moki, Marlbourough New Zeland<p>                           
                           
                            <h5>ROSÉ</h5>
                            <p>BLEND Glass $10 Bottle $40 <br>
                            Perrin \"Pour Les Gens\" | Rhone Valley, France</p>

                            <h5>RED</h5>
                            <p>CABERNET SAUVIGNON Glass $12 Bottle $48 <br>
                            AG Matta, Cabernet Sauvignon 2021 Central Valley</p>

                            <h5>BEERS</h5>
                            <p>LIGHT LAGER $7 <br>
                            Heights, New Magnolia Brewing Co. | Houston, TX ABV: 4%</p>
                            <p>IPA $7 <br>
                            Heights, New Magnolia Brewing Co. | Houston, TX ABV: 6.3%</p>

                            <h5>COFFEE</h5>
                            <p>LEONELLI BLEND DRIP COFFEE <br>
                            Small $3.25 Large $3.75</p>

                            <p>ESPRESSO <br>
                            Single $3 Double $4.95</p>
                            
                            <p>AMERICANO <br>
                            Small $4 Large $4.50</p>

                            <p>LATTE <br>
                            Small $4.25 Large $4.50</p>
                       
                            <p>CAPPUCCINO <br>
                            Small $4 Large $4.50</p>
                            
                            <p>MOCHA <br>
                            Small $5 Large $5.25</p>
                            
                            <p>CORTADO <br>
                            $3.75</p>

                            <p>MACCHIATO <br>
                            $3.50</p>

                            <p>COLD BREW <br>
                            Small $4.50 Large $4.95</p>
                            
                            <p>CHAI LATTE <br>
                            Small $4.50 Large $4.75</p>

                            <p>MILK ALTERNATIVES $1 <br>
                            Almond, Oat </p>
                            
                            <p>FLAVORS <br>
                            Syrups and Sauces <br>
                            $0.60 per Vanilla <br>
                            $0.60 per Hazelnut <br>
                            $1 per Mocha <br>
                            $0.60 per Caramel</p>

                            <h5>TEA</h5>
                            
                            <p>BREAKFAST BLEND $3.00</p>

                            <p>EARL GREY $3.00</p>

                            <p>GREEN $3.00</p>

                            <p>CHAI $3.00</p>

                            <p>CHAMOMILE $3.00</p>

                            <p>PEPPERMINT $3.00</p>

                            <p>ICED TEA $3.50</p>

                            <h5>SODAS & WATER</h5>
                            <p>SAN PELLEGRINO SODA $3.50 <br>
                            Sparkling Soda</p> 
                        
                            <p>SODA $3 <br>
                            Coke, Diet Coke, Sprite</p>
                            
                            <p>SPARKLING WATER $3.50 <br>
                            500ml</p>
                           
                            <p>STILL WATER $3.50 <br>
                            500ml</p>
                            
                            <p>POWERADES $4</p>

                            <h4>FROHZEN</h4>
                            <h5>HOMEMADE ICE CREAM</h5>
                            <p>One Scoop / 3oz / $6.00 <br>
                            Two Scoops / 5oz / $8.00 <br>
                            Three Scoops / 8oz / $10.00 <br>
                            SEASONAL FLAVORS (OPTIONS MAY VARY)</p>
                          </div>';

                    echo '<div id=' .$rest[3]. 'class="tabcontent">
                            <h3>' .$rest[3]. '</h3>
                            <p>Service Hours:' .$rest[4]. '</p>
                            <h4>LUNCH À LA CARTE</h4>
                            <p>MUSHROOM VELOUTE, PARSLEY FOAM, HAZELNUTS, PARMESAN CROUTON <br>
                            WINTER TARTINE, LOBSTER, DEVILED EGG, AVOCADO, SHAVED VEGETABLE, <br>
                            MURRAY\'S BURRATA, PECAN GREMOLATA, APPLE COMPOTE, RED WINE POACHED PEARS <br>
                            HOUSE SMOKED ORA KING SALMON, ORGANIC CRISPY POACHED EGG, CREME FRAICHE <br>
                            CHICORIES, TRUFFLE & GREEN GODDESS DRESSING, SPICED LAVASH, RADISHES</p>

                            <p>CAROLINA GOLD RICE RISOTTO, WINTER SQUASH, BRUSSELS SPROUTS, MIMOLETTE <br>
                            SUNCHOKE & RICOTTA AGNOLOTTI, CHESTNUT MOUSSE, GLAZED SALSIFY <br>
                            PAN SEARED SCALLOPS, PUMPKIN COULIS, BLACK CROUTONS <br>
                            YUCA CRUSTED COD, BEURRE BLANC, FRIED MAITAKE MUSHROOMS <br>
                            CHICKEN, JAMBON DE PARIS & HOLEY COW CHEESE, BABY GEM LETTUCE, FINE HERBS <br>
                            DUCK CONFIT, BABY TURNIPS, BUTTERY MASHED POTATOES, BLACK GARLIC <br>
                            BRAISED BEEF SHORT RIBS, PARSNIP & HORSERADISH FONDANT, WATERCRESS COULIS</p>

                            <h5>THREE COURSES</h5>
                            <p>APPETIZER, ENTREE, DESSERT</p>

                            <h5>WINTER FLAVORS</h5>
                            <p>FOUR COURSE CHEF\'S TASTING MENU</p>

                            <h5>DESSERTS</h5> 
                            <p>PLANT BASED ICE CREAMS <br>
                            VALRHONA GUANAJA DARK CHOCOLATE CRÉMEUX, SALTY CARAMEL SABAYON <br>
                            PASSION FRUIT CREAM & CITRUS PAVLOVA, CARACARA & BLOOD ORANGE, TOASTED PISTACHIO</p>

                            <h4>DINNER À LA CARTE</h4>
                            <p>MUSHROOM VELOUTE, PARSLEY FOAM, ROASTED HAZELNUTS, PARMESAN CROUTON <br>
                            MURRAY\'S BURRATA, PECAN GREMOLATA, RED WINE POACHED PEARS, APPLE COMPOTE <br>
                            CURED ORA KING SALMON, HEIRLOOM RADISHES & BEETS, YUZU VINAIGRETTE <br>
                            HEIRLOOM ROASTED BEETS, HERBAL GOAT CHEESE, MANDARINS, PISTACHIOS <br>
                            CHICORIES, GREEN GODDESS & TRUFFLE VINAIGRETTE, SPICED LAVASH, POMEGRANATE <br>
                            GRILLED OCTOPUS, FINGERLING POTATOES & ARTICHOKES, SPANISH CHORIZO, WINTER GREENS</p>

                            <p>SUNCHOKE & RICOTTA AGNOLOTTI, CHESTNUT MOUSSE, GLAZED SALSIFY <br>
                            CAROLINA GOLD RICE RISOTTO, WINTER SQUASH, BRUSSELS SPROUTS, PICKLED CARROTS, MIMOLETTE <br>
                            PAN SEARED SCALLOPS, PUMPKIN COULIS, BLACK CROUTONS</p>

                            <p>YUCA CRUSTED COD, BEURRE BLANC, FRIED MAITAKE MUSHROOMS <br>
                            BEEF TENDERLOIN AU JUS, CELERIAC FONDANT, BROCCOLINI, BLACK GARLIC <br>
                            COTE DE VEAU, SWEET BREADS FARCE, SHALLOT COULIS, BLUE OYSTER MUSHROOMS <br>
                            SPICED CRESCENT DUCK A L\'ORANGE, BABY TURNIPS, WINTER GREENS</p>
                            
                            <h4>DESSERT</h4>
                            <p>VALRHONA GUANAJA DARK CHOCOLATE CRÉMEUX, SALTY CARAMEL SABAYON</p>

                            <p>THE BUTTERFLY, YUZU DELICATE MOUSSE AND RASPBERRY COMPOTE, PISTACHIO SABLÉ</p>
                            
                            <p>LE JARDINIER PLANT BASED ICE CREAMS  
                            DARK CHOCOLATE, PISTACHIO, PUMPKIN SPICE LATTE</p>
                            
                            <p>CARAMELIZED APPLE, CALVADOS CREAM, CRANBERRY COULIS, FALL SPICE SABLE</p>
                            
                            <p>MILK CHOCOLATE MOUSSE, BLOOD ORANGE GELEE, FLEUR DE SEL SABLE</p>
                                                                                   
                            <p>ARTISANAL SELECTION OF CHEESES  $30</p>

                            <h4>BEVERAGE</h4>
                            <h5>COCKTAILS</h5>  
                            <p>NORTHERN LIGHTS Piplotti Rist Exhibition Feature 20 <br> 
                            AQUAVIT, HONEY, SEASONAL BERRIES, LIME </p>

                            <p>CROMOSAT & TONIC 17 <br>
                            FRENCH GIN, THYME, BUTTERFLY PEA FLOWER, TONIC, LIME</p>

                            <p>NOGUCHI WINTER GARDEN 16 <br>
                            MEYER LEMON VODKA, SAKE, BEETS, PINEAPPLE, LIME</p>

                            <p>LA COLOMBE 18 <br>
                            TEQUILA BLANCO, DAMIANA LIQUEUR, CHILES, GRAPEFRUIT, LIME, MEZCAL GARNISH</p>

                            <p>ONE IN A MELON 18 <br>
                            FRENCH VODKA,  HONEYDEW-INFUSED VERMOUTH, ORANGE AND CHAMPAGNE BITTERS</p>

                            <p>GRANDE L\'ORANGE 18 <br>
                            ORANGE-INFUSED BOURBON, GRAND MARNIER, AMARETTO, BRULEE ORANGE</p>

                            <h5>ZERO PROOF 11</h5>
                            <p>LE JARDIN <br>
                            CUCUMBER, FINE HERBS, MINT, LIME, SODA</p>

                            <p>JANNAH JUICE <br>
                            POMEGRANATE JUICE, ROSE WATER, DATE SYRUP, MINT</p>

                            <p>TWICE CHAI <br>
                            MASALA CHAI, OAT MILK, CARDAMOM CREAM, PISTACHIO</p>

                            <h5>BEER 8</h5>
                            <p>IPA <br>
                            NEW MAGNOLIA BREWING CO.</p>

                            <p>LIGHT-LAGER <br>
                            NEW MAGNOLIA BREWING CO.</p>

                            <h5>WINES BY THE GLASS</h5>
                            <h6>CHAMPAGNE & SPARKLING</h6>
                            <p>SPARKLING - VAL DE MER, CREMANT DE BOURGOGNE, FR  $17 <br>
                            BRUT CHAMPAGNE - DELAMOTTECHAMPAGNE, FR  $25 <br>
                            BRUT ROSE CHAMPAGNE  - LAURENT-PERRIER "CUVÉE ROSÉ" CHAMPAGNE, FR  $34 <br>
                            PRESTIGE CUVEE - LOUIS RODERER "CRISTAL"  CHAMPAGNE, FR , 2007   $95</p>

                            <h6>WHITE</h6>
                            <p>MELON DE BOURGOGNE - DOMAINE DE L\'ECU, LOIRE VALLEY, FR 2020  $15 <br>
                            SAUVIGNON BLANC - DELAPORTE "CHAVIGNOL"SANCERRE, FR 2021  $19 <br>
                            CHARDONNAY - CHRISTOPHE PATRICE1ER CRU "BEAUROY", CHABLIS, FR 2021  $25 <br>
                            CHARDONNAY -DOMAINE LEFLAIVE "MACON VERZÉ" BURGUNDY, FR2020$40 <br>
                            CHARDONNAY - POST & BEAM by FAR NIENTE,SONOMA COAST, CA, 2019  $20</p>

                            <h6>ROSÉ</h6>
                            <p>BLEND - PEYRASSOL "CUVEÉ DE COMMANDEURS" CÔTES DE PROVENCE, FR, 2021  $15 <br>
                            BLEND - DOMAINE LA SUFFRENE, BANDOL, FR 2021  $19</p>

                            <h6>RED</h6>
                            <p>PINOT NOIR - KEN WRIGHT, WILLAMETTE VALLEY, OR 2020  $17 <br>
                            PINOT NOIR - V&S MOREY "LE HATES" , BURGUNDY, FR 2018 $25 <br>
                            CHINON - COULY DUTHEIL \'BARONNIE MADELEINE", LOIRE VALLEY, FR 2017  $22 <br>
                            BORDEAUX BLEND - HAUT-BATAILLEY "PAULLIAC" BORDEAUX, FR 2014  $33 <br>
                            CABERNET SAUVIGNON BLEND - HOURGLASS "HGIII"NAPA VALLEY, CA 2019  $26</p>

                            <h6>CORAVIN SELECTION</h6>
                            <p>PULIGNY-MONTRACHET - ETIENNE SAUZET, BURGUNDY, 2020, $60 <br>
                            CABERNET SAUVIGNON - ARIETTA, NAPA VALLEY, CA 2011 $75 <br>
                            SAINT ESTEPHE - RED BLEND - CALON-SEGUR, BORDEAUX, FR 2018 $75</p>

                            <h4>WEEKEND BRUNCH MENU</h4>
                            <h5>SATURDAY & SUNDAY BRUNCH PRE-FIX MENU $76</h5>
                            
                            <h6>CAVIAR SERVICE</h6>
                            <p>RUSSIAN OSSETRA CAVIAR <br> 
                            1oz $130 - 2oz $230</p>

                            <h6>AMUSE JUICE</h6>
                            <p>SEASONAL PALATE CLEANSER<p>

                            <h6>FIRST COURSE (CHOICE OF)</h6>
                            <p>MURRAY\'S BURRATA, PECAN GREMOLATA, SPICED RED WINE POACHED PEARS, APPLE COMPOTE <br>
                            CHICORIES, TRUFFLE & GREEN GODDESS DRESSING, SPICED LAVASH, RADISHES <br>
                            CITRUS CURED ORA KING SALMON, HEIRLOOM RADISHES & BEETS, YUZU VINAIGRETTE <br>
                            WINTER TARTINE, LOBSTER, DEVILED EGGS, AVOCADO, SHAVED VEGETABLES <br>
                            MUSHROOM VELOUTE, PARSLEY EMULSION, TOASTED HAZELNUTS, PARMESAN CROUTON</p>

                            <h6>MAIN COURSE (CHOICE OF)</h6>
                            <p>MAINE LOBSTER BENEDICT, ORGANIC POACHED EGG, BRIOCHE, MISO HOLLANDAISE <br>
                            BEEF TENDERLOIN AU JUS, FINGERLING POTATOES, FRIED ORGANIC EGG, BRUSSELS SPROUTS <br>
                            ORGANIC SCRAMBLED EGGS, SMOKED ORA KING SALMON, EVERYTHING LAVASH <br>
                            CAROLINA GOLD RICE RISOTTO, WINTER SQUASH, BRUSSELS SPROUTS, PICKLED CARROTS,  MIMOLETTE, ORGANIC POACHED EGG <br>
                            CHICKEN, JAMBON DE PARIS & HOLEY COW CHEESE, BABY GEM LETTUCE, FINE HERBS</p>

                            <h6>DESSERT (CHOICE OF)</h6>
                            <p>VALRHONA GUANAJA DARK CHOCOLATE CREMEUX, SALTY CARAMEL SABAYON <br>
                            PANCAKE, APPLE CINNAMON COMPOTE, VANILLA CHANTILLY, CANDIED PECANS <br>
                            LE JARDINIER PLANT BASED ICE-CREAMS <br>
                            PASSIONFRUIT AND CITRUS PAVLOVA, CARACARA & BLOOD ORANGES, TOASTED PISTACHIO</p>
                        </div>';

                }
                else
                {
                    echo '0 results';
                }
            ?>
            <script>
                function openResturant(evt, cityName) 
                {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) 
                    {
                        tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) 
                    {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " active";
                }

                // Get the element with id="defaultOpen" and click on it
                document.getElementById("defaultOpen").click();
            </script>
    </body>
</html>