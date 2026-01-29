<?php
    /* ▂ ▅ ▆ █ Declaration of variables █ ▆ ▅ ▂ */
        $level = '0';
        $Menu = [];
    /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ */ 

    /* ▂ ▅ ▆ █ Whrite  li_1 ( Model menu ): █ ▆ ▅ ▂ */
        $item = '';
        $text = 'Home';
        $href = 'home';#index.php
        $item = "<li class='nav-item'>" ;
        $item .= "\t<a class='nav-link active' aria-current='page' href=$href> $text </a>";
        $item .= "</li>";
        $Menu['li_1'] = $item;
    /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ */ 


if( $level != '0' ){ return $Menu; };

    /* ▂ ▅ ▆ █ Whrite  li_2 ( Model with submenu ) █ ▆ ▅ ▂ */
        $item = '';
        $text = 'Usine';
        $hrefSubMenu1 = '#'; 
        $hrefSubMenu2 = '#'; $hrefSubMenu3 = '#'; $hrefSubMenu4 = '#';
        $item = "<li class='nav-item dropdown'>" ;
        $item .=    "\t<a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'> $text </a>";
        $item .=    "\t<ul class='dropdown-menu dropdown-menu-dark'>";
        $item .=        "\t\t<li><a class='dropdown-item' href=$hrefSubMenu1> Gérer </a></li>";
        // $item .=     "\t\t<li><a class='dropdown-item' href=$hrefSubMenu2> Action </a></li>";
        // $item .=     "\t\t<li><a class='dropdown-item' href=$hrefSubMenu3> Action </a></li>";
        // $item .=     "\t\t<li><a class='dropdown-item' href=$hrefSubMenu4> Action </a></li>";
        $item .=    "\t</ul>";
        $item .= "</li>";
        $Menu['li_2'] = $item;
    /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ */ 


    /* ▂ ▅ ▆ █ Whrite  li_3 ( Model with submenu ) █ ▆ ▅ ▂ */
        $item = '';
        $text = 'Production';
        $hrefSubMenu1 = '#'; 
        $hrefSubMenu2 = '#'; $hrefSubMenu3 = '#'; $hrefSubMenu4 = '#';
        $item = "<li class='nav-item dropdown'>" ;
        $item .=    "\t<a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'> $text </a>";
        $item .=    "\t<ul class='dropdown-menu dropdown-menu-dark'>";
        $item .=        "\t\t<li><a class='dropdown-item' href=$hrefSubMenu1> Gérer </a></li>";
        // $item .=     "\t\t<li><a class='dropdown-item' href=$hrefSubMenu2> Action </a></li>";
        // $item .=     "\t\t<li><a class='dropdown-item' href=$hrefSubMenu3> Action </a></li>";
        // $item .=     "\t\t<li><a class='dropdown-item' href=$hrefSubMenu4> Action </a></li>";
        $item .=    "\t</ul>";
        $item .= "</li>";
        $Menu['li_3'] = $item;
    /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ */  



    /* ▂ ▅ ▆ █ Whrite  li_4 ( Model with submenu ) █ ▆ ▅ ▂ */
        $item = '';
        $text = 'Topologie';
        $hrefSubMenu1 = '#'; 
        $hrefSubMenu2 = '#'; $hrefSubMenu3 = '#'; $hrefSubMenu4 = '#';
        $item = "<li class='nav-item dropdown'>" ;
        $item .=    "\t<a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'> $text </a>";
        $item .=    "\t<ul class='dropdown-menu dropdown-menu-dark'>";
        $item .=        "\t\t<li><a class='dropdown-item' href=$hrefSubMenu1> Gérer </a></li>";
        // $item .=     "\t\t<li><a class='dropdown-item' href=$hrefSubMenu2> Action </a></li>";
        // $item .=     "\t\t<li><a class='dropdown-item' href=$hrefSubMenu3> Action </a></li>";
        // $item .=     "\t\t<li><a class='dropdown-item' href=$hrefSubMenu4> Action </a></li>";
        $item .=    "\t</ul>";
        $item .= "</li>";
        $Menu['li_4'] = $item;
    /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ */  

    /* ▂ ▅ ▆ █ Whrite  Diviser in Li █ ▆ ▅ ▂ */
        $item = '';
        $item .= "<li> <hr class='nav-item'> </li>";
        $Menu['Diviser_Li'] = $item;
    /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ */ 

    /* ▂ ▅ ▆ █ Whrite  Diviser in Ul █ ▆ ▅ ▂ */
        $item = '';
        $item .= "<li> <hr class='dropdown-divider'> </li>";
        $Menu['Diviser_Ul'] = $item;
    /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ */ 




    /* ▂ ▅ ▆ █ Whrite  li_1 ( Model menu ): █ ▆ ▅ ▂ */
        $item = '';
        $text = 'Se déconnecter';
        $href = 'disconnect';#index.php
        $item = "<li class='nav-item'>" ;
        $item .= "\t<a class='nav-link active' aria-current='page' href=$href> $text </a>";
        $item .= "</li>";
        $Menu['li_10'] = $item;
    /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ */ 




    return $Menu;
?>

<?php
# Ex de menu html
                // <nav class="navbar navbar-dark fixed-top">
                //     <div class="container-fluid">
                //         <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                //         <span class="navbar-toggler-icon"> </span>
                //         </button>
                //        <!-- <a class="navbar-brand" href="#"></a> 
                //         <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">

                //             <div class="offcanvas-header">
                //                 <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"> Dark offcanvas </h5>
                //                 <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                //             </div>

                //             <div class="offcanvas-body">
                //                 <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                //                    <li class="nav-item">
                //                         <a class="nav-link active" aria-current="page" href="#">Home</a>
                //                     </li>
                //                     <li class="nav-item">
                //                         <a class="nav-link" href="#">Link</a>
                //                     </li>
                //                     <li class="nav-item dropdown">
                //                         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Dropdown </a>
                //                         <ul class="dropdown-menu dropdown-menu-dark">
                //                             <li><a class="dropdown-item" href="#">Action</a></li>
                //                             <li><a class="dropdown-item" href="#">Another action</a></li>
                //                             <li>
                //                                 <hr class="dropdown-divider">
                //                             </li>
                //                             <li><a class="dropdown-item" href="#">Something else here</a></li>
                //                         </ul>
                //                     </li>
                //                 </ul>
                //                 <form class="d-flex mt-3" role="search">
                //                     <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                //                     <button class="btn btn-success" type="submit">Search</button>
                //                 </form> 
                //             </div>
                //         </div>
                //     </div>
                // </nav>

?>