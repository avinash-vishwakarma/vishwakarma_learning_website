const imageInput = document.getElementById("profileInput");
const oldProfileContainer = document.getElementById("ProfileImageContainer");
const cropimageContainer = document.getElementById("cropImageContainer");
const uploadButton = document.querySelector("label[for='profileInput']");
const cropAndUploadBtn = document.getElementById("btn-crop_upload");
const form = document.getElementById("profileForm");
const cancleBtns = document.querySelectorAll(".cancleBtn");
const closeBtn = document.getElementById("closeBtn");
const UploadBtnContainer = document.querySelector(".uploadBtns");
const CropBtnContainer = document.querySelector(".cropAndUploadBtns");
const uploadSpinner = document.getElementById("uploadingSpinner");

let cropper;
imageInput.addEventListener("change", (e) => {
    const [file] = e.target.files;
    if (file) {
        // hide upload btn container
        UploadBtnContainer.classList.add("d-none");
        // show crop and upload btns
        CropBtnContainer.classList.remove("d-none");

        // hide old profile
        oldProfileContainer.classList.add("d-none");
        cropimageContainer.classList.remove("d-none");
        const image = cropimageContainer.firstElementChild;
        image.src = URL.createObjectURL(file);
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 2,
        });

        console.log("Cropper", cropper);
    }
});

console.log(cancleBtns);

cancleBtns.forEach((element) => {
    element.addEventListener("click", () => {
        // clear the uploaded file from input
        // hide crop & upload btn
        // show upload
        // show close btn

        // hide upload btn container
        UploadBtnContainer.classList.remove("d-none");
        // show crop and upload btns
        CropBtnContainer.classList.add("d-none");

        // hide old profile
        oldProfileContainer.classList.remove("d-none");
        cropimageContainer.classList.add("d-none");
        imageInput.value = "";
        if (cropper) {
            cropper.destroy();
        }
    });
});

function reduceSize(canvas, size) {
    let Quality = 1.0;

    function reduceBlob(quality) {
        console.log("Reducing Blob Process");

        const blobPromis = new Promise((resolve, rejected) => {
            // convert canvas into blob
            canvas.toBlob(
                (blob) => {
                    resolve(blob);
                },
                "image/jpeg",
                quality
            );
        });
        return blobPromis;
    }

    const initialBlob = new Promise((resolve, rejected) => {
        // convert canvas into blob
        console.log("Initial Blobs process");
        canvas.toBlob(
            (blob) => {
                resolve(blob);
            },
            "image/jpeg",
            Quality
        );
    });

    return initialBlob.then(async (blob) => {
        while (blob.size > size && Quality > 0.1) {
            // reduce the quality
            console.log("Reducing Loop");
            Quality = +(Quality - 0.1).toFixed(1);
            blob = await reduceBlob(Quality);
            console.log(blob, Quality);
        }
        console.log("Returning the blob");
        return blob;
    });
}

cropAndUploadBtn.addEventListener("click", async () => {
    uploadSpinner.classList.remove("d-none");
    const profileFormData = new FormData(form);
    profileFormData.delete("profile");
    const canvas = cropper.getCroppedCanvas();
    const blob = await reduceSize(canvas, 150 * 1024);
    profileFormData.append("profile", blob, "profile_image.jpeg");
    uploadSendRequest(profileFormData);
});

function uploadSendRequest(formData) {
    // uploading the image to the serve

    fetch(form.getAttribute("action"), {
        method: "POST",
        body: formData,
        headers: {
            Accept: "application/json",
        },
    })
        .then((res) => res.json())
        .then((data) => {
            // refresh the page
            location.reload();
            uploadSpinner.classList.add("d-none");
        })
        .catch((err) => console.log("Error :", err));
}
