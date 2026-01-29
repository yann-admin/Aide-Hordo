/* ▂ ▅  ????????????????????  ▅ ▂ */
/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */
/* ▂ ▂ ▂ ▂ ▂ ▂ ▂ */
/* ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ Import  ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ */

/* ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ Import  ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ */

/* ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ Export  ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ */

/* ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ Export  ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ */

/* ▂ ▅  CONSTANT  ▅ ▂ */
const MODE_DEV = true;

/* ▂▂▂▂▂▂▂▂▂▂▂▂▂ */

// /* ▂ ▅  Recup var for CSS App\css\color.css ▅ ▂ */
//     // Get the root element
//     const css = document.querySelector( ':root' );
//     // Get the styles for the root
//     const style = getComputedStyle( css );
//     Exemple:
//     input.style.backgroundColor = style.getPropertyValue('--INVALID_BACKGROUND');
// /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */

// / DEBUG /
// if(MODE_DEV)console.log("Log in: addEventListener ");
// if(MODE_DEV)console.log(objForm);
// if(MODE_DEV)console.log(' ' + );
// if(MODE_DEV)console.log("***********************************************");
// /* ***** */




/* ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ Import  ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ */
import { functionUser, RESPONCE_AJAX} from "";
/* ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ Import  ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ */
/* ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ Export  ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ */
export var RESPONCE_AJAX;
export function functionUser() { }
/* ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ Export  ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ */

/* ▂ ▅  window.addEventListener  ▅ ▂ */
    window.addEventListener("load", () => {
        FunctionListeningInput(['', '', ''], functionUser);
    });
/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂*/

/* ▂ ▅  FunctionListeningInput  ▅ ▂ */
    function FunctionListeningInput(ids, callback){
        ids.forEach(id => document.getElementById(id).addEventListener("click", () => callback(id)));
    };
/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂*/

/* ▂ ▅  functionUser  ▅ ▂ */
function functionUser() { };
/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂*/


