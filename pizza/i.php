<html>
    <head>
        <script>
            tabPanier=Array();
            tabPanier[1]=["fromage",0];
            tabPanier[2]=["anchois",0];
            tabPanier[3]=["4 fromages",0];
            function ajouter(numero, quantite) {
                tabPanier[numero][1]+=quantite;
                panier = document.getElementById("panier");    
                panier.innerHTML="";
                for(i in tabPanier) {
                    if(tabPanier[i][1]>0) {
                        panier.innerHTML+=tabPanier[i][1] + " pizza(s) " + tabPanier[i][0] + "<br>";
                    }
                }
               
            }  
        </script>
      
    </head>
    <body>
        <header>
            <div id="panier"></div>
        </header>
        <main>
            
            Pizza au fromage 
            <input type="button"  value="+" onclick="ajouter(1,1);">
            <input type="button"  value="-" onclick="ajouter(1,-1);">
            <br>
            Pizza 4 fromages
            <input type="button"  value="+" onclick="ajouter(3,1);">
            <input type="button"  value="-" onclick="ajouter(3,-1);">
        </main>
    </body>
</html>