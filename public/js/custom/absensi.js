function DisableButton() {
    $(document).ready(function() {
        $('#submit').prop('disabled', true);
    });
}

function startCountdown() {
    // Check if countdown value exists  in localStorage
    let countdownValue = localStorage.getItem('countdown');

    if (!countdownValue) {
        // Set initial countdown value (e.g., 10 minutes)
        countdownValue = 62; // 10 minutes and 2 seconds in seconds
        localStorage.setItem('countdown', countdownValue);
    }

    // Start countdown interval
    const countdownInterval = setInterval(() => {
        countdownValue--;

        if (countdownValue <= 0) {
            // Countdown reached zero, refresh the website
            var indexUrlElement = document.getElementById('indexUrl');
            var routeUrl = indexUrlElement.dataset.route;
            clearInterval(countdownInterval);
            localStorage.removeItem('countdown');
            let newUrl = routeUrl;
            window.location.assign(newUrl);
            // window.history.back();
            // window.location.reload();
        } else {
            // Update countdown display
            document.getElementById('countdown').textContent = formatTime(countdownValue);
            localStorage.setItem('countdown', countdownValue);
        }
    }, 1000); // Update countdown every second
}

function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = seconds % 60;

    return `${minutes.toString().padStart(2, '0')}:${remainingSeconds.toString().padStart(2, '0')}`;
}

// On page load, check if countdown value exists in localStorage and update the countdown display
document.addEventListener('DOMContentLoaded', () => {
    const countdownValue = localStorage.getItem('countdown');
    if (countdownValue != 0) {
        countdownValue = 0;
        document.getElementById('countdown').textContent = formatTime(countdownValue);
    } else {
        countdownValue = 102;
        document.getElementById('countdown').textContent = formatTime(countdownValue);
    }
});
