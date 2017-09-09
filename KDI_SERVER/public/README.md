#DESIGN_GERANT

> ##ARCHITECUTRE


* > **_CSS_** => Contient les fichiers styles de toutes l'application
    
    * **_SASS/_** =>     Contient tous les fichiers sass qui sont tous importés dans le fichier app.scss
   
        ```
        ├── app.arrow => Propriétés de la classe arrow utilisé avec le dropdown
        ├── app.button => Propriétés complémentaires des boutons utilisés
        ├── app.color => Définition des couleurs globales à l'application
        ├── app.icons => Propriétés des icons
        ├── app.layout => Elements réutilisables dans toutes les Pages
        ├── app.mixins => Fonctions centralisés de tout le design
        ├── app.nav => Propriétés de barres latérales affichées de gauche et de droite
        ├── app.plugins => Propriétés de certains plugins utilisés dans l'app
        ├── app.reset => Elements de base bootstrap modifiés pour undesign plus convivial
        ├── app.switch => Classe du bouton commutateur
        ├── app.utilities => Propriétés utilises couremment dans plusieurs autres elements qui sont externalisés et centralisés
        ├── app.variables => Toutes les variables centralisées
        ├── app.widgets => Elements propres à chaque Page mais réutilisables
        ├── toastr.scss => css du plugin toastr
        ```

    * **_animate.css_** => Animation css
    * **_auth.css_** => Compléments spécifique pour la page d'authentification
    * **_boostrap.css_** =>  v3.1.1 obligatoire pas de modification
    * **_font.css_** =>  fichier de définition des polices dont les polices sont stockés dans le dossier fonts
    * **_font.awesome.min.css_** =>  Minification du fichier font pour raison d'optimisation 
    * **_icon.css_** =>  Propriétés à utiliser autour des icons 


* > **_IMAGES_** -> Contient les images

* > **_JS_** -> Contient tous les plugins

    ```
    ├── calendar => CALENDRIER
    ├── charts/ => Différents graphes utilisés
    ├── chosen/ => Différents graphes utilisés
    ├── databables/ => Meilleur présentation avec la balise `<table/>`
    ├── datepicker/ => Design input du type date
    ├── file-input/ => Design input du type file
    ├── slimscroll/ => Design pour le scroll
    ├── toastr/ => Pour les notifications
    ├── wysiwyg/ => Pour créer du contenu interprétable c-à-dire contenant du html
    ├── app.js => Configuration des elements de base pouvant être utilisé dans l'app
    ├── bootstrap.js => Ficher js de bootstrap
    ├── jquery.min.js => jQuery v3.2.1
    ├── jquery-ui-1.10.3.custom.min.js => jQuery UI - v1.10.3 (nestable, sortable)
    ```
    

>## INTÉGRATION
    
*  **_POUR LES CSS_**
    * **_STANDARDS_**
        
        ```
        ├── bootstrap.css
        ├── animate.css
        ├── font-awesome.min.css
        ├── icon.css
        ├── font.css
        ├── app.css
        
        ```
         
        SONT UTILISÉS DANS TOUTES LES PAGES SAUF JUSTE 
        
    * **_AUTRES_**
        
            Les autres différents sont propres à certains pages en raison de leur necessité dans ces dernières
        

* **_POUR LES JS_**

    * **_STANDARDS_**
    
        ```
        ├── jquery.min.js
        ├── bootstrap.js
        ├── js/slimscroll/jquery.slimscroll.min.js
        ├── js/toastr/toastr.js
        ├── app.js
        ```
 
    * **_AUTRES_**
            
            Les autres différents sont propres à certains pages en raison de leur necessité dans ces dernières
