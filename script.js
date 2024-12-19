document.addEventListener('DOMContentLoaded', () => {
    // This will trigger animations when the page loads.
    const textElement = document.querySelector('.animated-text');
    textElement.style.opacity = 0;
    textElement.style.transform = "translateY(-20px)";

    setTimeout(() => {
        textElement.style.transition = "all 3s ease-out";
        textElement.style.opacity = 1;
        textElement.style.transform = "translateY(0)";
    }, 100);
});

document.addEventListener('DOMContentLoaded', () => {
    // Set the target date (July 1, 2025)
    const targetDate = new Date("July 1, 2025 00:00:00").getTime();

    // Update the countdown every second
    const interval = setInterval(() => {
        // Get current date and time
        const now = new Date().getTime();

        // Calculate the remaining time
        const distance = targetDate - now;

        // Calculate days, hours, minutes, and seconds
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the respective divs
        document.getElementById("days").textContent = `${days} Days`;
        document.getElementById("hours").textContent = `${hours} Hours`;
        document.getElementById("minutes").textContent = `${minutes} Minutes`;
        document.getElementById("seconds").textContent = `${seconds} Seconds`;

        // If the countdown is over, display a message
        if (distance < 0) {
            clearInterval(interval);
            document.getElementById("countdown-timer").innerHTML = "We're Live!";
        }
    }, 1000);
});
