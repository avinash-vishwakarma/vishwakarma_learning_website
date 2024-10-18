// this method is just used to submit the form using js
// Requirments from the funciton
// stop traditional submittion and submit using js
// make the submit button disable while submitting
// react based on response
// success cases
// redireact
// fail case
// show error message

// Structure of the function
// get the from element from html
// add event listener (submit)
// prevent default submit
// make the submit btn disable
// get the action value from form
// create a new Form data
// make the submission

const submitForm = document.getElementById("postForm");

submitForm.addEventListener("submit", (e) => {
    e.preventDefault();
    // disable the button
    const submit_button = e.target.querySelector("button[type=submit]");
    submit_button.classList.add("disabled");
    // show spinner
    submit_button.children[0].classList.remove("d-none");

    const newFormData = new FormData(submitForm);
    const action = submitForm.getAttribute("action");
    fetch(action, {
        method: "POST",
        body: newFormData,
        headers: {
            Accept: "application/json",
        },
    })
        .then((res) => res.json())
        .then((response) => {
            if (response.status === "ok") {
                // show a success status
                if ("redirect" in response) {
                    window.location.replace(response.redirect);
                }

                // enable the button
                submit_button.classList.remove("disabled");
                // hide spinner
                submit_button.children[0].classList.add("d-none");
            } else if ("errors" in response) {
                throw response;
            }
        })
        .catch((err) => {
            // enable the button
            submit_button.classList.remove("disabled");
            // hide spinner
            submit_button.children[0].classList.add("d-none");
            if ("message" in err) {
                console.log(err);

                // show the message in top
                const errorBox = e.target.querySelector("div[role=alert]");
                errorBox.classList.remove("d-none");
                errorBox.children[1].innerText = err.message;

                // add red border to to all invalid inputs

                if ("errors" in err) {
                    e.target.querySelectorAll("input").forEach((input) => {
                        input.classList.remove("border-danger");
                        if (err.errors[input.getAttribute("name")]) {
                            input.classList.add("border-danger");
                        }
                    });
                }
            }
        });
});
