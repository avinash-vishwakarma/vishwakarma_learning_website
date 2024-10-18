const resendForm = document.getElementById("resendForm");

const resendTimer = resendForm.querySelector("span");

resetCounter();

function resetCounter() {
    let seconds = 60;
    const timerId = setInterval(() => {
        if (seconds <= 0) {
            resendForm
                .querySelector("button[type=submit]")
                .classList.remove("disabled");
            resendForm.querySelector("#timerText").innerHTML = "";
            clearInterval(timerId);
        }
        resendTimer.innerText = seconds;
        seconds--;
    }, 1000);
}
