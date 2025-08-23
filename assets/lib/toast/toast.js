function showToast(message, type = 'default') {
    const toastContainer = document.getElementById("toast-container");
    const toast = document.createElement("div");
    toast.className = `toast-custom ${type}`;
    toast.innerHTML = `
        <span class="fs-sm">${message}</span>
        <button class="close-btn" onclick="removeToast(this.parentElement)">x</button>
        <div class="t-progress-bar"></div>
    `;

    toastContainer.appendChild(toast);

    // Trigger reflow and start the progress bar animation
    const progressBar = toast.querySelector('.t-progress-bar');
    requestAnimationFrame(() => {
        progressBar.classList.add('animate');
    });

    // Show the toast
    setTimeout(() => {
        toast.classList.add("show");
    }, 100);

    // Hide the toast after 3 seconds
    setTimeout(() => {
        toast.classList.remove("show");
        // Remove the toast from the DOM after the transition
        setTimeout(() => {
            if (toast.parentElement) {
                toastContainer.removeChild(toast);
            }
        }, 300);
    }, 3000);
}

function removeToast(toast) {
    toast.classList.remove("show");
    setTimeout(() => {
        if (toast.parentElement) {
            toast.parentElement.removeChild(toast);
        }
    }, 300);
}