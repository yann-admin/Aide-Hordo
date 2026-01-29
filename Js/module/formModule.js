/* ▂ ▅  ????????????????????  ▅ ▂ */
/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */
/* ▂ ▂ ▂ ▂ ▂ ▂ ▂ */
/* ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ Import  ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ */
// import { objectForm } from "../Entities/Form.js";
/* ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ Import  ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ */

/* ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ Export  ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ */
// export { ARRAY_OBJ_FORMS };
/* ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ Export  ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ */

/* ▂ ▅  CONSTANT  ▅ ▂ */
const MODE_DEV = true;
const FORMS = document.querySelectorAll('.needs-validation');
const FORMS_OTHER = document.querySelectorAll('.other');
const INPUTS = document.querySelectorAll('input');
const INPUTS_REQUIRED = document.querySelectorAll('[required]');
const INVALID_FEEDBACK = document.querySelectorAll('.invalid-feedback');
if (MODE_DEV) console.clear();

// const DIV_ERROR = document.getElementById('responce');
// const OBJ_CLASS_ALERT_BOOTSTRAP = new classAlertBootstrap(false, false, false, false, false, false, false);
/* ▂▂▂▂▂▂▂▂▂▂▂▂▂ */

// /* ▂ ▅  classAlertBootstrap(danger, secondary, success, warning, info, light, dark)  ▅ ▂ */
    //     function classAlertBootstrap(danger, primary, secondary, success, warning, info, light, dark) {
    //         this.danger = danger;
    //         this.primary = primary;
    //         this.secondary = secondary;
    //         this.success = success;
    //         this.warning = warning;
    //         this.info = info;
    //         this.light = light;
    //         this.dark = dark;
    //     };
// /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */

/* ▂ ▅  unction regex(regex)  ▅ ▂ */
let regex = function regex(regex) {
    switch (regex){
        case 'text-1':
            return /[A-Za-z\d]+/i;
        case 'password':
            return /[A-Za-z\d\/@$!%*?&#]+/i;
    }; 
};
/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */

/* ▂ ▅  initForms  ▅ ▂ */
    export function initForms() {
        // Loop over them and prevent submission form class .needs-validation
        Array.from(FORMS).forEach(form => {
            form.addEventListener('submit', (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        });

        Array.from(INPUTS).forEach(input => {
            input.addEventListener("change", function (event) { validityInput(event) }, false);
            // input.addEventListener("value.change", function (event) { validityInput(event) }, false);           
        });

        / DEBUG /
        if (MODE_DEV) console.clear();
        if (MODE_DEV) console.log("↓↓↓↓↓↓↓↓↓↓ initForms() => formModule.js  ↓↓↓↓↓↓↓↓↓↓");
        if (MODE_DEV) console.log(FORMS);
        if (MODE_DEV) console.log(FORMS_OTHER);
        if (MODE_DEV) console.log(INPUTS_REQUIRED);
        if (MODE_DEV) console.log(INVALID_FEEDBACK);
        if (MODE_DEV) console.log(INPUTS);
        if(MODE_DEV)console.log("↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑");
        /* ---- */
    };
/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */

/* ▂ ▅  validityInput(event)  ▅ ▂ */
    export function validityInput(event) {
        let error = '';
        let field = event.target;

        // Don't validate submits, buttons, file and reset inputs, and disabled fields
        if (field.disabled || field.type === 'file' || field.type === 'reset' || field.type === 'submit' || field.type === 'button') return;

        // Get validity
        let validity = field.validity;
        // If valid, return null
        if (validity.valid) {
            addClassInput(field.id, 'valid');
            removeError(field);
            disabledBtnSubmit(true);
            return;
        };

        // test validity field
        error = infoError(event, validity);
        
        // if error then showError and add class is-invalid
        if (error) {
            showError(field, error);
            addClassInput(field.id, 'invalid');
            disabledBtnSubmit(false);
            return;
        };    
        
        // if not error then removeError
        removeError(field);

        disabledBtnSubmit(true);
        / DEBUG /
        if(MODE_DEV)console.clear();
        if(MODE_DEV)console.log("↓↓↓↓↓↓↓↓↓↓ validityInput => formModule.js  ↓↓↓↓↓↓↓↓↓↓");
        if(MODE_DEV)console.log('error ' + error);
        //if (MODE_DEV) console.log('' + regexControl);
        if(MODE_DEV)console.log("↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑");
        /* ---- */
    };
/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */

/* ▂ ▅  validityKeypress(event)  ▅ ▂ */
    export function validityKeypress(event) {
        // if touch = enter return
        if (event.charCode == 13) return;
        let field = event.target;    
        // if fiel.tagName=BODY return because error
        if (field.tagName == 'BODY') { return; };

        let touch = event.key;//String.fromCharCode(event.charCode);  
        let touch2 = String.fromCharCode(event.charCode);
        let regexControl = regex(field.getAttribute('regex'));
        let divFeedBack = 'feedback-' + field.id;
        let validity = field.validity.valid;
        // If field is valide then raz class is-invalid
        if (validity) {
            document.getElementById(divFeedBack).innerText = '';
            // addClassInput(field.id, 'valid')
        };
        // !!!! NE FONCTIONNE PAS SUR MOBILE
        // If regex doesn't match
        if (!regexControl.test(touch)) {
            document.getElementById(divFeedBack).innerText = 'L\'uilisation du caractère \' ' + touch + ' \' n\'est pas autorisé';
            addClassInput(field.id, 'invalid');
            disabledBtnSubmit(false);
        } else {
            document.getElementById(divFeedBack).innerText = '';
            addClassInput(field.id, 'remove'); 
            disabledBtnSubmit(true);
        };

        // let fault = touch.match(regexControl);
        // if (!fault) {
        //     document.getElementById(divFeedBack).innerText = 'L\'uilisation du caractère \' ' + touch + ' \' n\'est pas autorisé';
        //     addClassInput(field.id, 'invalid')
        //     disabledBtnSubmit(false);
        // } else {
        //     document.getElementById(divFeedBack).innerText = '';
        //     addClassInput(field.id, 'remove')  
        //     disabledBtnSubmit(true);
        // };

        
        / DEBUG /
        if(MODE_DEV)console.clear();
        if(MODE_DEV)console.log("↓↓↓↓↓↓↓↓↓↓ infoError = function testInput(event) => formModule.js  ↓↓↓↓↓↓↓↓↓↓");
        if(MODE_DEV)console.log('regexControl ' + regexControl);
        if(MODE_DEV)console.log('divFeedBack ' + divFeedBack);
        if (MODE_DEV) console.log('validity ' + validity);
        if (MODE_DEV) console.log('charCode ' + event.charCode);
        if(MODE_DEV)console.log("↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑");
        /* ---- */
    };
/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */

/* ▂ ▅  let infoError = function testInput(event)  ▅ ▂ */
    function addClassInput(id, bool) {
        let field = document.getElementById(id);

        if (bool == 'invalid') {
            if (field.classList.contains('is-valid')) { field.classList.remove('is-valid'); }
            field.classList.add('is-invalid');
        };

        if (bool == 'valid') {
            if (field.classList.contains('is-invalid')) { field.classList.remove('is-invalid'); }
            field.classList.add('is-valid');
        };   
        
        if (bool == 'remove') {
            if (field.classList.contains('is-valid')) { field.classList.remove('is-valid'); }
            if (field.classList.contains('is-invalid')) { field.classList.remove('is-invalid'); }
        };        

    };
/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */


/* ▂ ▅  let infoError = function testInput(event)  ▅ ▂ */
    let infoError = function testInput(event, validity) {
        let field = event.target;


        // If not the right type
        if (validity.typeMismatch) {
            // Email
            if (field.type === 'email') return 'Veuillez saisir une adresse e-mail valide.';
            // URL
            if (field.type === 'url') return 'Veuillez saisir une URL valide.';
        };

        // If too short
        if (validity.tooShort) return 'Veuillez allonger ce texte à ' + field.getAttribute('minLength') + ' caractères ou plus. Vous utilisez actuellement ' + field.value.length + ' caractères.';

        // If too long
        if (validity.tooLong) return 'Veuillez raccourcir ce texte à ' + field.getAttribute('maxLength') + ' caractères maximum. Vous utilisez actuellement ' + field.value.length + ' caractères.';

        // If number input isn't a number
        if (validity.badInput) return 'Veuillez saisir un nombre.';

        // If a number value doesn't match the step interval
        if (validity.stepMismatch) return 'Veuillez sélectionner une valeur valide.';

        // If a number field is over the max
        if (validity.rangeOverflow) return 'Veuillez sélectionner une valeur inférieure ' + field.getAttribute('max') + '.';

        // If a number field is below the min
        if (validity.rangeUnderflow) return 'Veuillez sélectionner une valeur supérieure ' + field.getAttribute('min') + '.';   
        
        // If pattern doesn't match
        if (validity.patternMismatch) return 'Veuillez respecter le format demandé.'; 

        // If field is required and empty
        if (validity.valueMissing) return 'Veuillez remplir ce champ.';

        // If all else fails, return a generic catchall error
        return 'La valeur que vous avez saisie pour ce champ est invalide.';

    };
/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */


/* ▂ ▅  showError(field, error)  ▅ ▂ */
    function showError(field, error) {
        let divFeedBack = 'feedback-' + field.id;
        document.getElementById(divFeedBack).innerText = error;
        addClassInput(field.id, true)
    };
/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */


/* ▂ ▅  removeError(field)  ▅ ▂ */
    function removeError(field) {
        let divFeedBack = 'feedback-' + field.id;
        document.getElementById(divFeedBack).innerText = '';
        addClassInput(field.id, false)
    };
/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */

/* ▂ ▅  removeError(field)  ▅ ▂ */
    export function resetError(field) {
        Array.from(INVALID_FEEDBACK).forEach(invalid_feedback => {
            let divFeedBack = invalid_feedback.id;
            document.getElementById(divFeedBack).innerText = '';
            addClassInput(divFeedBack, false)
        });
    };
/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */

/* ▂ ▅  disabledBtnSubmit(bool)  ▅ ▂ */
    function disabledBtnSubmit(bool) {
        let formValidate = bool;
        Array.from(INPUTS).forEach(input => {
            // We escape the input token
            if (input.id != 'token') {
                // We escape the input antirobot!=''
                if (input.id == 'antirobot') {
                    if (input.value != '') { formValidate = false; };
                };
                if (formValidate) {
                    if ((!input.validity.valid) || (input.classList.contains('is-invalid'))) { formValidate = false; };
                }
            }; 
        });

        // formValidate = true;
        if (formValidate) { document.getElementById('true').removeAttribute('disabled'); } else { document.getElementById('true').setAttribute('disabled', '');};
    };
/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */