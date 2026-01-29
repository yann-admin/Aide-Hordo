/* ▂ ▅  ????????????????????  ▅ ▂ */
/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */
/* ▂ ▂ ▂ ▂ ▂ ▂ ▂ */
/* ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ Import  ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ */
    import { startLoader, stopLoader } from "../module/loader.js";
/* ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ Import  ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ */

/* ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ Export  ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ */
// export { ARRAY_OBJ_FORMS };
/* ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ Export  ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ */

/* ▂ ▅  CONSTANT  ▅ ▂ */
    const MODE_DEV = true;
    if (MODE_DEV) console.clear();
/* ▂▂▂▂▂▂▂▂▂▂▂▂▂ */


/* ▂ ▅  handleFormSubmit(event)  ▅ ▂ */
    export async function handleFormSubmit(event) {
            // @ function module loader.js function(duration)
            startLoader(3000);
            event.preventDefault();
            const form = event.currentTarget;
            const url = form.action;
            try {
                // create object Formdate
                const formData = new FormData(form);
                // Add append(name, value) append ( Le nom du champ dont les données sont contenues dans .value,  La valeur du champ)
                //formData.append("true", "true");
                // Add inputs not processed by Formdata 
                const checkbox = form.querySelectorAll('input[type=checkbox]');
                Array.from(checkbox).forEach(checkbox => {
                    formData.append(checkbox.id, checkbox.checked);
                });
                const button = form.querySelectorAll('button');
                Array.from(button).forEach(button => {
                    formData.append(button.id, button.value);
                });

                const responseData = await postFormDataAsJson({ url, formData });

                // If responseData.textInfo is !='' then the message is written to the user in the <div id='userMessage'>
                if (responseData.divInfo != '') { document.getElementById('userMessage').innerHTML = responseData.divInfo; } else { document.getElementById('userMessage').innerHTML = ''; };
                if (responseData.redirect != '') { window.location.href = responseData.redirect; };
                / DEBUG /
                // if (MODE_DEV) console.clear();
                if (MODE_DEV) console.log("↓↓↓↓↓↓↓↓↓↓ handleFormSubmit() => submitForm.js  ↓↓↓↓↓↓↓↓↓↓");
                if (MODE_DEV) console.log(formData);
                if (MODE_DEV) console.log(responseData);
                if (MODE_DEV) console.log(checkbox);
                if (MODE_DEV) console.log(button);
                if(MODE_DEV)console.log("↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑");
                /* ---- */

            } catch (error) {
                console.log(error);
        };
        // @ function module loader.js function(delay)
        stopLoader(300);
    };
/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */

/* ▂ ▅  handleFormSubmit(event)  ▅ ▂ */
    async function postFormDataAsJson({ url, formData }) {
        const plainFormData = Object.fromEntries(formData.entries());
        const formDataJsonString = JSON.stringify(plainFormData);
    
        const fetchOptions = {
            method: "POST",
            credentials: "include",   
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                Accept: "text/html,application/xhtml+xml",
            },
            body: formDataJsonString,
        };

        const response = await fetch(url, fetchOptions);

        if (!response.ok) {
            const errorMessage = await response.json();
            throw new Error(errorMessage);
        };

        / DEBUG /
        // if (MODE_DEV) console.clear();
        if (MODE_DEV) console.log(formDataJsonString);
        /* ---- */ 
        
        return response.json();
    };
/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */