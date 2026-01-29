/* ▂ ▅  ????????????????????  ▅ ▂ */
// / DEBUG /
//if (MODE_DEV) console.clear();
// if(MODE_DEV)console.log("↓↓↓↓↓↓↓↓↓↓  addEventListener => formModule.js  ↓↓↓↓↓↓↓↓↓↓");
// if(MODE_DEV)console.log(objForm);
// if(MODE_DEV)console.log(' ' + );
// if(MODE_DEV)console.log("↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑");
// /* ***** */
/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */
/* ▂ ▂ ▂ ▂ ▂ ▂ ▂ */
/* ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ Import  ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ */
// import { CSS, STYLE  } from "../module/cssModule.js";
    import { startLoader, stopLoader } from "../module/loader.js";
    // @ function module loader.js function(duration)
    startLoader(3000);    
    import {initForms, validityInput, validityKeypress, resetError } from "../module/formModule.js";
    import {handleFormSubmit } from "../module/submitForm.js";
/* ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ Import  ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ */
//novalidateloads, requiredLoads, addEventListenerBlur, reserForm
/* ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ Export  ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ */
//   zzzzzzz6Pi
//   4Pmlllll@d
/* ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ Export  ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ */


/* ▂ ▅  CONSTANT  ▅ ▂ */
    const MODE_DEV = false;
    if (MODE_DEV) console.clear();
/* ▂▂▂▂▂▂▂▂▂▂▂▂▂ */

/* ▂ ▅  window.addEventListener  ▅ ▂ */
    window.addEventListener("load", () => { 
        // @ function module formModule.js function()
        initForms();

        // For Bootstrap:
            // Enable tooltips Bootstrap:
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
        // ------------------------------------------
        // Listen to all blur events
            // @ function module formModule.js function()
            document.addEventListener('blur', function (event) {validityInput(event)}, true);
        // ------------------------------------------
        // Listen to all keypress events
            // @ function module formModule.js function()
            document.addEventListener('keypress', function (event) {validityKeypress(event)}, true);
        // ------------------------------------------

        // Listen to all touchend events
            // document.addEventListener("touchend", function (event) {validityKeypress(event)}, true);
        // ------------------------------------------   

        // Creation of event headphones 
            listenBtnRest(['false'], resetError);
            function listenBtnRest(ids, callback) {
                // @ function module formModule.js function()
                ids.forEach(id => document.getElementById(id).addEventListener("click", () => callback(id)));
            };
            let form = document.getElementById("formLogin");
            // @ function module submitForm.js function()
            form.addEventListener("submit", function (event) {handleFormSubmit(event)}, true);
        // ------------------------------------------

        / DEBUG /
            if(MODE_DEV)console.log("↓↓↓↓↓↓↓↓↓↓ addEventListener => loginPage.js  ↓↓↓↓↓↓↓↓↓↓");
            // if (MODE_DEV) console.log(FORM);
            // if (MODE_DEV) console.log(FORMs);
            if(MODE_DEV)console.log("↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑");
        /* ---- */

        // @ function module loader.js function(delay)
        stopLoader(500);

    });
/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂*/



